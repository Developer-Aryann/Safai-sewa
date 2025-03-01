<script>
    $(".single_select_customer").select2({
        theme: "bootstrap4",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ?
            'style="width:100%"' : null,
        dropdownParent: $(this).data('container') ? $($(this).data('container')) : null,
        containerCssClass: $(this).data('containerclass') ? $(this).data('containerclass') : null,
        placeholder: "Select a Customer",
        allowClear: true
    });

    document.addEventListener("DOMContentLoaded", function() {
        let taxRate = 25;
        let couponDiscount = 0;
        let addonTotal = 0;
        let extraDiscount = 0;

        $(document).on("click", "#printcheck", function() {
            var paid = Number($('input[name=paid_amount]').val())
            var date = $('input[name=deliverydate]').val()
            var date_hidden = $('input[name=deliverydate_hidden]').val()
            var payment_type = $('#POS_payment_type_list').val()
            if (paid > 0) {
                if (!payment_type) {
                    return toastr.warning('Please Select Payment Type')
                }
            }
            if (date < date_hidden) {
                return document.getElementById("POS_worning").innerHTML = "Enter Delivery Date";
            }
            $("#posprintform").submit()
        })



        document.querySelector("#service_pos_search").addEventListener("input", function() {
            let query = this.value.toLowerCase();
            document.querySelectorAll("#pos_service .services").forEach(service => {
                let serviceName = service.querySelector("h6").textContent.toLowerCase();
                service.style.display = serviceName.includes(query) ? "block" : "none";
            });
        });

        document.querySelectorAll("#add_service_pos_cart_submit").forEach(button => {
            button.addEventListener("click", function() {
                let modal = this.closest(".modal");
                let serviceId = modal.id.split("_").pop();
                let serviceName = modal.querySelector(".modal-title").textContent.replace(
                    " Service Type", "");
                let selectedAddon = modal.querySelector("input[name='servicetype']:checked");

                if (!selectedAddon) {
                    alert("Please select a service type!");
                    return;
                }

                let addonId = selectedAddon.value;
                let addonName = selectedAddon.closest(".form-check").querySelector("label")
                    .textContent;
                let price = parseFloat(selectedAddon.closest(".form-check").querySelector(
                    "label").textContent.match(/\d+(\.\d+)?/)[0]);

                let newRow = `
                <tr data-service-id="${serviceId}" data-addon-id="${addonId}">
                    <td><h5 class="mb-0">${serviceName}</h5><span class="mb-0 fs-6">[${addonName}]</span></td>
                    <td><input type="color" class="p-2" value="#000000"></td>
                    <td><input type="number" class="form-control h-25 text-center px-2 service-price" value="${price}" readonly></td>
                    <td><input type="number" class="form-control h-25 text-center px-2 service-quantity" value="1" min="1"></td>
                    <td><a class="btn btn-sm remove-service"><i class="fa fa-trash text-danger"></i></a></td>
                </tr>
            `;

                document.querySelector("#POS_service_added_list").insertAdjacentHTML(
                    "beforeend", newRow);
                modal.querySelector(".btn-close").click();
                updateTotals();
            });
        });

        document.addEventListener("click", function(e) {
            if (e.target.closest(".remove-service")) {
                e.target.closest("tr").remove();
                updateTotals();
            }
        });

        document.addEventListener("input", function(e) {
            if (e.target.classList.contains("service-quantity")) {
                updateTotals();
            }
        });

        document.querySelector("#POS_coupon_code_apply").addEventListener("click", function() {
            let couponCode = document.querySelector("input[name='coupon_code']").value.trim();

            if (couponCode === "") {
                alert("Enter a valid coupon code!");
                return;
            }

            fetch("/apply-coupon", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        coupon_code: couponCode
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        couponDiscount = parseFloat(data.discount);
                        document.querySelector("#POS_coupon_total").textContent = couponDiscount
                            .toFixed(2);
                        updateTotals();
                    } else {
                        alert("Invalid coupon!");
                    }
                })
                .catch(error => console.error("Coupon Error:", error));
        });

        document.querySelector("#add_addons_pos_cart_submit").addEventListener("click", function(e) {
            e.preventDefault();
            let selectedAddons = document.querySelectorAll("#POS_addons input[name='addon']:checked");

            addonTotal = 0;
            let addonHtml = "";
            selectedAddons.forEach(addon => {
                let addonName = addon.closest(".d-flex").querySelector("h5").textContent;
                let price = parseFloat(addon.closest(".d-flex").querySelector("h6").textContent
                    .match(/\d+(\.\d+)?/)[0]);
                addonTotal += price;
            });

            document.querySelector("#POS_addon_total").innerHTML = addonTotal;
            document.querySelector(".btn-close").click();
            updateTotals();
        });

        document.querySelector("#POS_payment_model_btn").addEventListener("click", function() {
            updatePaymentModal();
        });

        function updatePaymentModal() {
            let subtotal = parseFloat(document.querySelector("#POS_sub_total").textContent);
            let tax = parseFloat(document.querySelector("#POS_tax_total").textContent);
            let grossTotal = parseFloat(document.querySelector("#POS_gross_total").textContent);

            document.querySelector("#payment_subtotal").textContent = `$ ${subtotal.toFixed(2)}`;
            document.querySelector("#payment_addons").textContent = `$ ${addonTotal.toFixed(2)}`;
            document.querySelector("#payment_extradiscount").textContent = `$ 0.00`;
            document.querySelector("#payment_coupondiscount").textContent = `$ ${couponDiscount.toFixed(2)}`;
            document.querySelector("#payment_text_perdent").textContent = `(${taxRate}%)`;
            document.querySelector("#payment_text_amount").textContent = `$ ${tax.toFixed(2)}`;
            document.querySelector("#payment_grosstotal").textContent = `$ ${grossTotal.toFixed(2)}`;
        }

        document.querySelector("#POS_extra_discount_order").addEventListener("input", function() {
            extraDiscount = parseFloat(this.value) || 0;
            let grossTotal = parseFloat(document.querySelector("#POS_gross_total").textContent);

            if (extraDiscount > grossTotal) {
                this.value = grossTotal;
                extraDiscount = grossTotal;
            }

            document.querySelector("#payment_extradiscount").textContent =
                `$ ${extraDiscount.toFixed(2)}`;
            updateTotals();
        });

        document.querySelector("#paid_amount").addEventListener("input", function() {
            let paidAmount = parseFloat(this.value) || 0;
            let grossTotal = parseFloat(document.querySelector("#POS_gross_total").textContent);
            let balance = Math.max(paidAmount - grossTotal, 0);
            document.querySelector("#POS_total_balance").textContent = `$ ${balance.toFixed(2)}`;
        });

        function updateTotals() {
            let subtotal = 0;
            document.querySelectorAll("#POS_service_added_list tr").forEach(row => {
                let price = parseFloat(row.querySelector(".service-price").value);
                let quantity = parseInt(row.querySelector(".service-quantity").value);
                subtotal += price * quantity;
            });

            let tax = subtotal > 0 ? (subtotal * taxRate) / 100 : 0;
            let grossTotal = subtotal + addonTotal + tax - couponDiscount - extraDiscount;

            document.querySelector("#POS_sub_total").textContent = subtotal.toFixed(2);
            document.querySelector("#POS_addon_total").textContent = addonTotal.toFixed(2);
            document.querySelector("#POS_tax_total").textContent = tax.toFixed(2);
            document.querySelector("#POS_gross_total").textContent = Math.max(grossTotal, 0).toFixed(2);
            document.querySelector("#payment_grosstotal").textContent =
                `$ ${Math.max(grossTotal, 0).toFixed(2)}`;

            updatePaymentModal();
        }

        document.querySelector("#POS_clear").addEventListener("click", function() {
            document.querySelector("#POS_service_added_list").innerHTML = "";
            document.querySelector("#POS_addons_list").innerHTML = "";
            couponDiscount = 0;
            addonTotal = 0;
            extraDiscount = 0;
            document.querySelector("#POS_extra_discount_order").value = "";
            updateTotals();
        });

        document.querySelector("#POS_clear").addEventListener("click", function() {
            document.querySelector("#POS_service_added_list").innerHTML = "";
            document.querySelector("#POS_addons_list").innerHTML = "";
            couponDiscount = 0;
            addonTotal = 0;
            updateTotals();
        });

        function updatePaymentButtonState() {
            let grossTotal = parseFloat(document.querySelector("#POS_gross_total").textContent);
            let paymentButton = document.querySelector("#POS_payment_model_btn");

            if (grossTotal > 2) {
                paymentButton.removeAttribute("disabled");
            } else {
                paymentButton.setAttribute("disabled", "disabled");
            }
        }

        updatePaymentButtonState();
    });
</script>

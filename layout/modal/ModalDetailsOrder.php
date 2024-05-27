<!-- Checkout Selection Payment -->
<div class="fixed inset-0 flex items-center justify-center text-black bg-black bg-opacity-0 text-start -z-20">
    <div id="PaymentBox" class="alamat-wrapper opacity-0 bg-white lg:w-[30%] md:w-[70%] w-[90%] h-fit rounded-lg">
        <div class="flex justify-between p-4">
            <h6 class="text-xs font-semibold capitalize md:text-base">Ringkasan Belanja</h6>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 cursor-pointer closeBox text-blue-Neru"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M18 6l-12 12"></path>
                <path d="M6 6l12 12"></path>
            </svg>
        </div>
        <hr />
        <div class="flex flex-col gap-3 p-4 ">
            <div class="flex flex-col gap-4 body">
                <?php if (!empty($showAddedItem)): ?>
                    <?php
                    $total = 0; // Initialize total 
                    $itemCount = count($showAddedItem); // Get the count of items
                    ?>
                    <div class="flex flex-col gap-4 wrapper">
                        <div class="xl:max-h-[170px] max-h-[100px] overflow-y-auto flex flex-col gap-3">
                            <?php foreach ($showAddedItem as $index => $itemcartList): ?>
                                <?php
                                $subtotal = $itemcartList["product_price"] * $itemcartList["order_quantity"];
                                $total += $subtotal;
                                ?>
                                <div class="flex flex-col gap-1.5 justify-between">
                                    <h6 class="text-sm lg:text-base line-clamp-2 product_name">
                                        Item Name: <?= htmlspecialchars($itemcartList['product_name']) ?>
                                    </h6>
                                    <span class="flex items-center gap-1">
                                        <h6 class="text-sm lg:text-base product_price">
                                            Product Price: <?= number_format($itemcartList['product_price'], 0) ?>
                                            <span class="font-medium text-red-500"> X </span>
                                            <input class="w-[30px] h-[30px] outline-none order_quantity" type="number" readonly
                                                value="<?= htmlspecialchars($itemcartList["order_quantity"]) ?>">
                                        </h6>
                                    </span>
                                    <h6 class="text-sm lg:text-base order_subtotal">Subtotal: Rp.
                                        <?= number_format($subtotal, 0) ?>
                                    </h6>
                                </div>
                                <?php if ($index < $itemCount - 1): // Only add <hr> if not the last item ?>
                                    <hr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <hr>
                        <div class="flex flex-col gap-4 mt-auto">
                            <span class="flex justify-between">
                                <h6 class="text-sm lg:text-base">Ongkir</h6>
                                <h6 class="text-sm lg:text-base">Rp -</h6>
                            </span>
                            <span class="flex justify-between">
                                <h6 class="text-sm lg:text-base">Biaya Admin</h6>
                                <h6 class="text-sm lg:text-base">Rp -</h6>
                            </span>
                            <span class="flex justify-between">
                                <h6 class="text-sm lg:text-base">Total Belanja</h6>
                                <h6 class="text-sm totalBelanja lg:text-base order_total">Rp.
                                    <?= number_format($total, 0) ?>
                                </h6>
                            </span>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex flex-col gap-4 wrapper">
                        <div class="flex flex-col justify-center h-10 gap-3 overflow-y-auto">
                            <!-- Cart items will be dynamically loaded here -->
                        </div>
                        <hr>
                        <span class="flex justify-between">
                            <h6 class="text-sm lg:text-base">Ongkir</h6>
                            <h6 class="text-sm lg:text-base">Rp. -</h6>
                        </span>
                        <span class="flex justify-between">
                            <h6 class="text-sm lg:text-base">Total Belanja</h6>
                            <h6 class="text-sm lg:text-base">Rp. -</h6>
                        </span>
                    </div>
                <?php endif; ?>
                <hr />
                <div class="flex items-center justify-end">
                    <?php if (isset($_POST['submit'])) {
                        if (insertCheckout($_POST) > 0) {
                            echo "
                                <script>
                                    alert('Silakan Lakukan Pembayaran');
                                    window.location.href = 'paymentWaitingList.php'; 
                                </script>";
                        }
                    } ?>
                    <form action="" class="w-full" method="POST">
                        <input type="hidden" name="user_id" value="<?= $user_id ?>">
                        <input type="hidden" name="total_price" value="<?= $total ?>">
                        <button type="submit" name="submit"
                            class="w-full py-2 text-xs font-semibold text-center text-white capitalize rounded-lg cursor-pointer md:text-sm px-9 bg-blue-Neru closeBox animate-pulse">
                            Bayar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
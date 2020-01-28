<template>
    <div class="modal fade" id="modal-consumption" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inserir consumo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" @submit.prevent="saveForm">
                        <div class="form-group">
                            <label for="booking-search">Quarto</label>
                            <v-select
                                @search="searchCustomer"
                                v-model="customer"
                                :filterable="false"
                                :options="customers"
                            />
                        </div>
                        <div class="form-group">
                            <label for="product-search">Código do Produto</label>
                            <v-select
                                @search="searchProduct"
                                v-model="product"
                                :filterable="false"
                                :options="products"
                            />
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="amount">Valor Unitário</label>
                                    <input type="text" class="form-control form-control-xl" :value="unitPrice" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="amount">Quantidade</label>
                                    <input type="text" class="form-control form-control-xl" v-model="amount">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="amount">Total</label>
                                    <input type="text" class="form-control form-control-xl" :value="totalPrice" readonly>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import vSelect from 'vue-select';
import { formatMoney } from '../utils';
import { searchProduct } from '../services/ProductService';
import { searchCustomer } from '../services/CustomerService';
import { fetchActiveBookings } from '../services/BookingService';

export default {
    components: {
        vSelect,
    },
    data() {
        return {
            amount: 1,
            customers: [],
            customer: null,
            products: [],
            product: null,
        };
    },
    async created() {
        this.products = await searchProduct();
        this.customers = await searchCustomer();
    },
    computed: {
        unitPrice() {
            return this.product ? formatMoney(this.product.price) : null;
        },
        totalPrice() {
            return this.product && this.amount
                ? formatMoney(this.product.price * this.amount)
                : null;
        }
    },
    methods: {
        async searchProduct(query, loading) {
            loading(true);
            this.products = await searchProduct(query);
            loading(false);
        },
        async searchCustomer(query, loading) {
            loading(true);
            this.customers = await searchCustomer(query);
            loading(false);
        },
        async saveForm() {
            await axios.post('/orders', {
                customer_id: this.customer ? this.customer.id : null,
                product_id: this.product ? this.product.id : null,
                amount: this.amount,
            });

            window.location.reload();
        }
    }
}
</script>

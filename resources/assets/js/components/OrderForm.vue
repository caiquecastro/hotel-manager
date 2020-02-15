<template>
    <div>
        <h1>Pedidos</h1>
        <div class="row">
            <div class="col-12 col-sm-6">
                <form action="" @submit.prevent="saveForm">
                    <div class="form-group">
                        <label for="booking-search">Mesa</label>
                        <v-select
                            @search="searchOrder"
                            v-model="order"
                            :filterable="false"
                            :options="orders"
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
                        <div class="col-7">
                            <div class="form-group">
                                <label for="amount">Valor Unitário</label>
                                <input type="text" class="form-control form-control-xl" :value="unitPrice" readonly>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="amount">Quantidade</label>
                                <input type="text" class="form-control form-control-xl" v-model="amount">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="amount">Total</label>
                                <input type="text" class="form-control form-control-xl" :value="totalPrice" readonly>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg" :disabled="!order">Salvar</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <ul v-for="item in orderItems" :key="item.id"></ul>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import vSelect from 'vue-select';
import { formatMoney } from '../utils';
import { searchOrders } from '../services/OrderService';
import { searchProduct } from '../services/ProductService';

export default {
    components: {
        vSelect,
    },
    data() {
        return {
            amount: 1,
            products: [],
            product: null,
            orders: [],
            order: null
        };
    },
    async created() {
        this.orders = await searchOrders();
        this.products = await searchProduct();
    },
    methods: {
        async searchProduct(query, loading) {
            loading(true);
            this.products = await searchProduct(query);
            loading(false);
        },
        async searchOrder(query, loading) {
            loading(true);
            this.orders = await searchOrders(query);
            loading(false);
        },
        async saveForm() {
            if (!this.orderId) {
                return alert('Nenhum pedido selecionado');
            }

            await axios.post(`/orders/${this.orderId}/items`, {
                product_id: this.product ? this.product.id : null,
                amount: this.amount,
            });

            alert('Feito');
        }
    },
    computed: {
        unitPrice() {
            return this.product ? formatMoney(this.product.price) : null;
        },
        totalPrice() {
            return this.product && this.amount
                ? formatMoney(this.product.price * this.amount)
                : null;
        },
        orderItems() {
            return this.order ? this.order.items : [];
        }
    }
}
</script>

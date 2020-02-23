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
                        <button class="btn btn-primary btn-lg" v-if="order && !loading">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-sm-6">
                <table class="table mt-3" v-if="orderItems.length">
                    <thead>
                        <th>Data</th>
                        <th>Produto</th>
                        <th>Valor</th>
                        <th></th>
                    </thead>
                    <tfoot>
                        <tr>
                            <tr>
                                <td colspan="2">Total</td>
                                <td>{{ orderTotal | price }}</td>
                            </tr>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr v-for="item in orderItems" :key="item.id">
                            <td>{{ item.created_at | date }}</td>
                            <td>{{ item.amount }} {{ item.product.name }}</td>
                            <td>{{ item.price | price }}</td>
                            <td>
                                <button @click="deleteItem(item)" class="btn btn-danger btn-sm">
                                    &times;
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
            loading: false,
            amount: 1,
            products: [],
            product: null,
            orders: [],
            order: null,
            orderTotal: 0,
            orderItems: []
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
        async fetchItems() {
            if (!this.order) {
                this.orderItems = [];
                return;
            }

            const { data } = await axios.get(`/orders/${this.order.id}`);

            this.orderItems = data.items;
            this.orderTotal = data.total;
        },
        async deleteItem(item) {
            if (confirm("Deseja excluir o item?")) {
                await axios.delete(`/order-items/${item.id}`);

                this.fetchItems();
            }
        },
        async saveForm() {
            if (!this.order) {
                return alert('Nenhum pedido selecionado');
            }
            this.loading = true;

            const orderId = this.order.id;

            await axios.post(`/orders/${orderId}/items`, {
                product_id: this.product ? this.product.id : null,
                amount: this.amount,
            });

            this.loading = false;
            this.product = null;
            this.fetchItems();
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
        }
    },
    watch: {
        order: 'fetchItems'
    }
}
</script>

<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Inserir consumo</h5>
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
                        @search="searchBooking"
                        v-model="booking"
                        :filterable="false"
                        :options="bookings"
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
        <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="save-consumption">Salvar</button>
        </div> -->
    </div>
</template>

<script>
import axios from 'axios';
import vSelect from 'vue-select';
import { formatMoney } from '../utils';

export default {
    components: {
        vSelect,
    },
    data() {
        return {
            amount: 1,
            bookings: [],
            booking: null,
            products: [],
            product: null,
        };
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
            const { data } = await axios.get('/products', {
                params: {
                    q: query
                },
            });

            this.products = data.data.map(p => ({
                ...p,
                label: `${p.barcode} - ${p.name}`,
            }));
            loading(false);
        },
        async searchBooking(query, loading) {
            loading(true);
            const { data } = await axios.get('/bookings', {
                params: {
                    active: 1,
                    q: query
                },
            });

            this.bookings = data.data.map(b => ({
                ...b,
                label: `${b.room.number} - ${b.customer.name}`,
            }));
            loading(false);
        },
        async saveForm() {
            await axios.post('/consumption', {
                booking_id: this.booking ? this.booking.id : null,
                product_id: this.product ? this.product.id : null,
                amount: this.amount,
            });
        }
    }
}
</script>

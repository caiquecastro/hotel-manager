<template>
    <div>
        <div class="alert alert-danger" v-if="error">{{ error }}</div>
        <form method="POST" :action="action" @submit.prevent="submitForm">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="customer_id">Cliente</label>
                    <select id="customer_id" class="form-control" v-model="form.customer_id" :class="{ 'is-invalid': form.errors.has('customer_id') }">
                        <option :value="null">Selecione</option>
                        <option v-for="customer in customers" :key="customer.id" :value="customer.id">
                            {{ customer.name }}
                        </option>
                    </select>
                    <div class="invalid-feedback">{{ form.errors.first('customer_id') }}</div>
                </div>
                <div class="form-group col-md-6">
                    <label for="checkin">Entrada a partir de</label>
                    <datetime-input :invalid="form.errors.has('checkin')" v-model="form.checkin" />
                    <div class="invalid-feedback">{{ form.errors.first('checkin') }}</div>
                </div>
                <div class="form-group col-md-6">
                    <label for="checkout">Saída até</label>
                    <datetime-input :invalid="form.errors.has('checkout')" v-model="form.checkout" />
                    <div class="invalid-feedback">{{ form.errors.first('checkout') }}</div>
                </div>
                <div class="form-group col-md-6">
                    <label for="room_id">Quarto</label>
                    <rooms-select v-model="form.room_id" :invalid="form.errors.has('room_id')" />
                    <div class="invalid-feedback">{{ form.errors.first('room_id') }}</div>
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Valor</label>
                    <input type="text" class="form-control" v-model.number="form.price" :class="{ 'is-invalid': form.errors.has('price') }" />
                    <div class="invalid-feedback">{{ form.errors.first('price') }}</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import RoomsSelect from './RoomsSelect';
import { getErrorMessage } from '../utils';
import BookingForm from '../forms/Booking';
import DatetimeInput from './DatetimeInput';

export default {
    components: {
        RoomsSelect,
        DatetimeInput,
    },
    props: {
        id: {},
    },
    async created() {
        try {
            await this.loadForm();

            const { data: customers } = await axios.get('/customers');
            this.customers = customers.data;
        } catch (err) {
            //
        }
    },
    data() {
        return {
            error: null,
            form: new BookingForm(),
            customers: [],
        };
    },
    methods: {
        async loadForm() {
            if (!this.id) {
                return;
            }

            const { data } = await axios.get(`/bookings/${this.id}`);

            this.form.withData(data);
        },
        async submitForm() {
            const method = this.method.toLowerCase();

            try {
                const data = await this.form[method](this.action);

                if (!this.id) {
                    window.location.href = `/bookings/${data.id}`;
                }
                this.form.withData(data);
            } catch (err) {
                this.error = getErrorMessage(err);
            }
        },
    },
    computed: {
        method() {
            return this.id ? 'PATCH' : 'POST';
        },
        action() {
            return this.id ? `/bookings/${this.id}` : '/bookings';
        }
    }
};
</script>

<template>
    <div>
        <div class="alert alert-danger" v-if="error">
            {{ error }}
        </div>
        <form method="POST" :action="action" @submit.prevent="submitForm">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="customer_id">Cliente</label>
                    <select id="customer_id" class="form-control" v-model="form.customer_id">
                        <option :value="null">Selecione</option>
                        <option v-for="customer in customers" :key="customer.id" :value="customer.id">
                            {{ customer.name }}
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="checkin">Entrada a partir de</label>
                    <input type="datetime-local" class="form-control" v-model="form.checkin">
                </div>
                <div class="form-group col-md-6">
                    <label for="checkout">Saída até</label>
                    <input type="datetime-local" class="form-control" v-model="form.checkout">
                </div>
                <div class="form-group col-md-6">
                    <label for="room_id">Quarto</label>
                    <select name="room_id" id="room_id" class="form-control" v-model="form.room_id">
                        <option :value="null">Selecione</option>
                        <option v-for="room in rooms" :key="room.id" :value="room.id">
                            {{ room.number }}
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Valor</label>
                    <input type="text" class="form-control" v-model.number="form.price" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import BookingForm from '../forms/Booking';

export default {
    props: {
        id: {},
    },
    async created() {
        try {
            await this.loadForm();

            const { data: rooms } = await axios.get('/rooms');
            this.rooms = rooms.data;

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
            rooms: [],
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
                this.form.withData(data);
            } catch (err) {
                this.error = err.message;
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

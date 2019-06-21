<template>
    <form @submit.prevent="onSubmit" :method="method" :action="action">
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label for="name" class="label">Nome</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <input type="text" v-model="form.name" class="input" name="name" id="name">
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label for="price" class="label">Preço</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <money v-model="form.price" v-bind="money" class="input" name="price"></money>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label"></div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>


<script>
import axios from 'axios';
import { Money } from 'v-money';

export default {
    props: {
        action: {},
        method: {},
        initialData: {},
    },

    components: {
        Money,
    },

    data () {
        return {
            form: {
                name: '',
                price: 0,
            },
            money: {
                decimal: ',',
                thousands: '.',
                prefix: 'R$ ',
                precision: 2,
            },
        }
    },

    created() {
        this.form = {
            ...this.initialData,
        };
    },

    methods: {
        async onSubmit() {
            try {
                const { data } = await axios({
                    method: this.method,
                    url: this.action,
                    data: this.form
                });

                this.$noty.success('Tipo de Quarto salvo com sucesso!');

                const redirectUrl = `/types/${data.id}/edit`;

                if (redirectUrl !== window.location.pathname) {
                    window.location.href = redirectUrl;
                }
            } catch (err) {
                this.$noty.error('Erro ao salvar o tipo de quarto.');
            }
        }
    }
}
</script>

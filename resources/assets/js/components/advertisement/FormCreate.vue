<template>
    <div class="container">
        <Categories v-on:setCategory="setCategory"></Categories>

        <form id="form" enctype="multipart/form-data">
            <input type="hidden" name="category_id" v-model="category">

                <div class="card card-default">
                    <div class="card-header">Название</div>
                    <div class="card-body">
                        <input type="text" class="form-control" name="title">
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">Описание</div>
                    <div class="card-body">
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">Цена</div>
                    <div class="card-body">
                        <input type="text" class="form-control" name="price">
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">Личные данные</div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Адрес">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Телефон">
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" @click="submit" class="btn btn-primary pull-right">Отправить</button>
        </form>

        <div style="clear: both; padding-top: 10px;">
            <ul class="list-group list-group-flush" v-if="errors" v-for="error in errors">
                <li class="list-group-item list-group-item-danger">{{ error }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    import * as $$ from "lodash";

    export default {
        data() {
            return {
                category: '',
                errors: [],
            }
        },
        methods:{
            setCategory: function(value){
                this.category = value;
            },
            submit: function (e) {
                e.preventDefault();

                let data = new FormData(document.getElementById('form'));
                let errors = [];

                axios.post('/advertisements/store', data)
                    .then(response => {
                    })
                    .catch(error => {
                        let errorsData = error.response.data.errors;

                        $$.each(errorsData, function(error) {
                            errors.push(error[0]);
                        });
                    });

                this.errors = errors;
            }
        }
    }
</script>

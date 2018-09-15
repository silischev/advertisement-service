<template>
    <div class="container">
        <Categories v-on:setCategory="setCategory"></Categories>

        <form enctype="multipart/form-data">
            <input type="hidden" name="category" v-model="category">

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
                <button type="submit" class="btn btn-primary pull-right">Отправить</button>

        </form>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                category: '',
            }
        },
        methods:{
            setCategory: function(value){
                this.category = value;
            },
        }
    }
</script>

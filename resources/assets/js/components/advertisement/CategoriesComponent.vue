<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Категории</div>

                    <div class="card-body">
                        <ul class="list-group col-md-4" v-for="category in this.filteredCategoriesByParentId">
                            <li class="list-group-item">
                                <a href="#">{{ category.name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    import * as $$ from "lodash";

    export default {
        methods: {
        },
        computed: {
            filteredCategoriesByParentId: function() {
                let filteredCategories = [];
                let activeLevel = this.activeLevel;

                $$.each(this.categories, function(category) {
                    if (category.level === activeLevel) {
                        filteredCategories.push(category);
                    }
                    //console.log(category.name);
                });

                return filteredCategories;
            }
        },
        data() {
            return {
                categories: {},
                activeLevel: 0,
            }
        },
        created() {
            axios.get('/categories/list')
                .then(response => {
                    this.categories = response.data;
                });
        },
        mounted() {
        }
    }
</script>

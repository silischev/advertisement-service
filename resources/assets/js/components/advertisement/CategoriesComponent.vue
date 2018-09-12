<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Категории</div>

                    <div class="card-body">
                        <div>{{ activePath }}</div>

                        <ul class="list-group col-md-4" v-for="category in filteredCategoriesByParentId">
                            <li class="list-group-item">
                                <a href="#" :data-parent="category.id" v-on:click="rebuildCategoriesList">{{ category.name }}</a>
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
            rebuildCategoriesList: function (e) {
                this.activeLevel = e.target.dataset.parent;

                this.filteredCategoriesByParentId;
            },
        },
        computed: {
            filteredCategoriesByParentId: function() {
                let filteredCategories = [];
                let activeLevel = this.activeLevel * 1;

                $$.each(this.categories, function(category) {
                    if (category.parent_id === activeLevel) {
                        filteredCategories.push(category);
                    }
                });

                if (filteredCategories.length === 0) {
                    return this.activeCategories;
                }

                this.activeCategories = filteredCategories;

                return filteredCategories;
            }
        },
        data() {
            return {
                categories: {},
                activeCategories: {},
                activeLevel: 0,
                activePath: '',
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

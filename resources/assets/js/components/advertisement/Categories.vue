<template>
    <div class="card card-default">
        <div class="card-header">Категории</div>

        <div class="card-body">
            <div>{{ activePath }}</div>

            <ul class="list-group col-md-4" v-for="category in filteredCategoriesByParentId">
                <li class="list-group-item">
                    <a href="#" :data-parent-id="category.id" :data-parent-name="category.name" v-on:click="rebuildCategoriesList">{{ category.name }}</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    import * as $$ from "lodash";

    export default {
        methods: {
            rebuildCategoriesList: function (e) {
                this.activeLevel = e.target.dataset.parentId;

                this.filteredCategoriesByParentId;

                if (this.hasChild) {
                    this.activePath += e.target.dataset.parentName + ' / ';
                } else if (this.chosenCategory !== this.activeLevel) {
                    if (this.chosenCategory === 0) {
                        this.activePath += e.target.dataset.parentName;
                    } else {
                        let currentActivePath = this.activePath.split('/');

                        currentActivePath.pop();
                        this.activePath = currentActivePath.join(' / ') + ' / ' + e.target.dataset.parentName;
                    }

                    this.chosenCategory = this.activeLevel;
                }

                if (this.chosenCategory !== 0) {
                    this.$emit('setcategory', this.chosenCategory);
                }
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
                    this.hasChild = false;

                    return this.activeCategories;
                }

                this.hasChild = true;
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
                chosenCategory: 0,
                hasChild: true,
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

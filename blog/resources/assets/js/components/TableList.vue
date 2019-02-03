<template>
    <div>
        

        <div class="form-inline">
            <a v-if="create" v-bind:href="create">Create</a>
            <div class="form-group pull-right">
                <input type="search" placeholder="Search" class="form-control" v-model="search">
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th v-for="title in titles">{{title}}</th>
                    <th v-if="detail || edit || deleted">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item, index in list">
                    <td v-for="i in item">{{i}}</td>
                    <td v-if="detail || edit || deleted">
                        <form v-bind:id="index" v-if="deleted && token" v-bind:action="deleted" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">
                            <a v-if="detail" v-bind:href="detail">Detail | </a>
                            <a v-if="edit" v-bind:href="edit">Edit | </a> 
                            <a v-on:click="executeForm(index)">Delete</a>
                        </form>
                        <span v-if="!token">
                            <a v-if="detail" v-bind:href="detail">Detail | </a>
                            <a v-if="edit" v-bind:href="edit">Edit | </a> 
                            <a v-if="deleted" v-bind:href="deleted"></a>
                        </span>
                        <span v-if="token && !deleted">
                            <a v-if="detail" v-bind:href="detail">Detail | </a>
                            <a v-if="edit" v-bind:href="edit">Edit</a>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titles', 'items', 'create', 'detail', 'edit', 'deleted', 'token'],
        data: function(){
            return {
                search: ''
            }
        },
        methods:{
            executeForm: function(index){
                document.getElementById(index).submit();
            }
        },
        computed:{
            list: function(){
                return this.items.filter(res => {
                    for(let k = 0; k<res.length; k++){
                        if((res[k]+ "").toLowerCase().indexOf(this.search.toLowerCase()) >= 0){
                            return true;
                        }
                    }
                    return false;
                });


                return this.items;
            }
        }
    }
</script>

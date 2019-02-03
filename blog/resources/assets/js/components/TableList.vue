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
                    <th style="cursor: pointer" v-for="(title, index) in titles" :key="title.index" v-on:click="orderColumn(index)">{{title}}</th>
                    <th v-if="detail || edit || deleted">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in list" :key="item.index">
                    <td v-for="i in item" :key="i.index">{{i}}</td>
                    <td v-if="detail || edit || deleted">
                        <form v-bind:id="index" v-if="deleted && token" v-bind:action="deleted" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">
                            <a v-if="detail" v-bind:href="detail">| Detail </a>
                            <a v-if="edit" v-bind:href="edit">| Edit</a> 
                            <a v-on:click="executeForm(index)">| Delete |</a>
                        </form>
                        <span v-if="!token">
                            <a v-if="detail" v-bind:href="detail">| Detail </a>
                            <a v-if="edit" v-bind:href="edit">| Edit </a> 
                            <a v-if="deleted" v-bind:href="deleted">| Delete |</a>
                        </span>
                        <span v-if="token && !deleted">
                            <a v-if="detail" v-bind:href="detail">| Detail </a>
                            <a v-if="edit" v-bind:href="edit">| Edit |</a> 
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titles', 'items', 'order', 'orderCol', 'create', 'detail', 'edit', 'deleted', 'token'],
        data: function(){
            return {
                search: '',
                orderAux: this.order || "asc",
                orderAuxCol: this.orderCol || 0
            }
        },
        methods:{
            executeForm: function(index){
                document.getElementById(index).submit();
            },
            orderColumn: function(column){
                this.orderAuxCol = column;
                if(this.orderAux.toLowerCase() == "asc"){
                    this.orderAux = "desc";
                } else {
                    this.orderAux = "asc";
                }
            }
        },
        computed:{
            list: function(){

                let order    = this.orderAux;
                let orderCol = this.orderAuxCol;

                order = order.toLowerCase();
                orderCol = parseInt(orderCol);

                if(order == 'asc'){
                    this.items.sort(function(a,b){
                        if (a[orderCol] > b[orderCol]){
                            return 1;
                        } else if (a[orderCol] < b[orderCol]){
                            return -1;
                        } else {
                            return 0;
                        }
                    });
                } else {
                    this.items.sort(function(a,b){
                        if (a[orderCol] < b[orderCol]){
                            return 1;
                        } else if (a[orderCol] > b[orderCol]){
                            return -1;
                        } else {
                            return 0;
                        }
                    });
                }

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

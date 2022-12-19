<template>
    <div class="inputBox shadow">
        <div class="container">
            <div class="stock_col">
                <p><label for="s_name">이름</label></p>
                <p><label for="s_price">가격</label></p>
                <p><label for="s_num">수량</label></p>
                <p><label for="s_select">카테고리</label></p>
            </div>
            <div class="stock_val">
                <p><input type="text" id="s_name" v-model="stock.name"></p>
                <p><input type="text" id="s_price" v-model="stock.price"></p>
                <p><input type="text" id="s_num" v-model="stock.count"></p>
                <p><select id="s_select" v-model="stock.category">
                    <option value="domestic" selected>국내주식</option>
                    <option value="foreign">해외주식</option>
                    <option value="bond">채권ETF</option>
                    <option value="realty">실물ETF</option>
                </select></p>
                <span class="addContainer" @click="addTodo"><i class="addBtn fas fa-plus" aria-hidden="true"></i></span>
            </div>
        </div>

        <modal v-if="showModal" @close="showModal = false">
            <h3 slot="header">경고</h3>
            <span slot="footer" @click="showModal = false">
                할 일을 입력하세요
                <i class="closeModalBtn fas fa-times" aria-hidden="true"></i>
            </span>
        </modal>
    </div>
</template>

<script>
let i = 0;

import Modal from './common/Modal.vue'

export default {
    props : ['propsdata'],
    data() {
        return {
            stock : {
                id : '',
                name : '',
                price : '',
                count : '',
                category : 'domestic',
                date : new Date().toLocaleDateString()
            },
            showModal : false
        }
    },
    methods : {
        addTodo() {
            if (this.stock.price) {
                this.stock.id = i;
                i++;
                let value = JSON.stringify(this.stock);
                this.$emit('addTodo', value);
                this.clearInput();
            } else {
                console.log('clicked');
                this.showModal = true;
            }
        },
        clearInput() {
            this.stock.name = '';
            this.stock.price = '';
            this.stock.count = '';
            this.stock.category = 'domestic';
        }
    },
    components : {
        Modal : Modal
    }
}
</script>

<style scope>
    /* col */
    .inputBox{
        background:#6478FB;
        line-height:50px;
        border-radius:5px;
    }
    .stock_col {display:flex;}
    .stock_col p {width:20%; margin-right:1%;}
    .stock_col p label {color:#eee; font-weight: bold;}

    /* val */
    input:focus {
        outline: none;
    }
    .inputBox input {
        border-style:none;
        font-size:0.9rem;
        height:50px;
        line-height:50px;
    }
    .stock_val {display:flex;}
    .stock_val p {display:inline-block; width:20%; margin-right:1%;}
    .stock_val p input {width:100%;}
    .stock_val select {height:50px; width:100%; border:none;}

    /* bu'n */

    .addContainer {
        width:15%;
        height:50px;
        background:linear-gradient(to right, #abb0d2, #b277ab);
        display:block;
        border-radius: 0 5px 5px 0;
    }
    .addBtn {
        color:white;
        vertical-align: middle;
    }
</style>
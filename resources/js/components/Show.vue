<template>
    <div class="container pb-5" >

        <div class="mt-5 alert alert-warning text-center" role="alert">
            Эта страница использует роут <a href="/api/letter">/api/letter</a> и в соответствии с заданием он выдает только поля name и email..
        </div>
        <div class="row justify-content-center">
            <button class="btn btn-link" v-on:click="getLetters(page, 'asc')">Сортировать по возрастанию даты создания</button>
            <button class="btn btn-link" v-on:click="getLetters(page, 'desc')">Сортировать по убыванию даты создания</button>
        </div>
        <div class="row mt-5 justify-content-center pb-5">
            <button class="btn btn-link" v-on:click="getLetters(prev_link ? page - 1 : page, sort)">Назад</button>
            <button class="btn btn-link" v-on:click="getLetters(next_link ? page + 1 : page, sort)">Вперед</button>
        </div>

        <div v-for="item in letters" class="row justify-content-center">
            <div class="col-md-6 custom-row pb-2">
                <p class="name">
                    <label class="col-12">Имя</label>
                    <input readonly class="col-12 form-control" type="text" name="name" v-bind:value="item.name"/>
                </p>

                <p class="email">
                    <label class="col-12">E-Mail</label>
                    <input readonly type="text" class="col-12 form-control" name="email" v-bind:value="item.email"/>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Show',
    data: function () {
      return {
          page: 1,
          sort: null,
          letters: [],
          next_link: null,
          prev_link: null
      }
    },
    methods: {
        getLetters(page, sort) {
            axios.get("/api/letter", {
                params:{
                    page: page,
                    created_at: sort
                }
            }).then((result) => {
                if (result.status === 200) {
                    this.page = result.data.current_page;
                    this.prev_link = result.data.prev_page_url;
                    this.next_link = result.data.next_page_url;
                    this.letters = result.data.data;
                    this.sort = sort;
                } else {
                    alert("Ошибка сервера")
                }
            });
        },
        showButtons() {
            return false
        },
        setDesc() {
            this.sortCreated="desc"
        }
    },
    created() {
        this.getLetters()
    }
}
</script>

<style>
</style>

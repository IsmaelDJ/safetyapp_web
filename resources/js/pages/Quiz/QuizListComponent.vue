<template lang="">
    <div>
        <div class="card">
            <div class="card-body">
                    <liste-header 
                        title="Liste des quiz" 
                        button="Ajouter un quiz"
                        link="http://localhost:8000/quiz_questions/create"></liste-header>
          
                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr >
                            <th scope="col">Illustration</th>
                            <th scope="col">Reponse</th>
                            <th scope="col">Description</th>
                            <th class="col">Catégorie</th>
                            <th scope="col">Audio Français</th>
                            <th scope="col">Audio Arabe</th>
                            <th scope="col">Audio Ngambaye</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(currentQuizQuestion, index) in currentQuizQuestions.data" :key="currentQuizQuestion.id">
                                <td style="width: 150px;">
                                    <img :src="currentQuizQuestion.image" alt=""
                                                               class="avatar-md h-auto d-block rounded">
                                </td>
                                <td style="width: 250px">
                                    <a type="button" href="#"
                                        v-if="currentQuizQuestion.correct"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-tag me-1"></i> Correct
                                    </a>
                                    <a type="button" href="#"
                                        v-else
                                        class="btn btn-danger btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-tag me-1"></i> Faux
                                    </a>
                                </td>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify">{{ currentQuizQuestion.description }}</p>
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    <a type="button" href="route('categories.show', currentQuizQuestion.category"
                                       class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">
                                       <i class="mdi mdi-tag me-1"></i>
                                        {{ currentQuizQuestion.category.name }}
                                    </a>
                                </td>
                                <td >
                                    <div class="essential_audio" :data-url="'http://localhost:8000/' + currentQuizQuestion.fr"></div>
                                </td>
                                <td>
                                    <div class="essential_audio" :data-url="'http://localhost:8000/' + currentQuizQuestion.ar" ></div>
                                </td>
                                <td>
                                    <div class="essential_audio" :data-url="'http://localhost:8000/' + currentQuizQuestion.ng" ></div>
                                </td>
                                <td style="width: 200px">
                                    <div class="d-flex gap-3">

                                        <a 
                                            href="#"
                                           class="btn btn-default">
                                                Détails
                                        </a>
                                        <a 
                                            href="http://localhost:8000/quiz_questions' + currentQuizQuestion.id + '/edit'"
                                           class="btn btn-info">
                                           Modifier
                                        </a>

                                        <a href="#" class="btn btn-danger">
                                            Supprimer</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <Pagination :data="currentQuizQuestions" @pagination-change-page="getResults" />
        </div>
    </div>
</template>
<script>
import ListHeader from '../Components/ListHeaderComponent.vue';
import LaravelVuePagination from 'laravel-vue-pagination';

export default {
    components:{
        ListHeader, 
        'Pagination': LaravelVuePagination
    },
    data() {
        return {
            currentQuizQuestions: {},
        }
    },
    mounted () {
        this.getResults()
    },
    methods: {
            getResults(page = 1) {
            axios.get(window.location.origin + '/quiz_questions?page='+page)
                .then(response => this.currentQuizQuestions = response.data)
                .catch(error => console.error(error))
        }
    }
}
</script>
<style lang="">
    
</style>
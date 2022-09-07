<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="/" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-starter-page">Tableau de bord</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ol"></i>
                        <span key="t-multi-level">Règles</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('rules.index')}}" key="t-level-1-1">Toutes les règles</a></li>
                        <li><a href="{{route('rules.create')}}" key="t-level-1-1">Ajouter</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-slider-alt"></i>
                        <span key="t-multi-level">Catégories</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('categories.index')}}" key="t-level-1-1">Toutes les catégories</a></li>
                        <li><a href="{{route('categories.create')}}" key="t-level-1-1">Ajouter</a></li>
                    </ul>
                </li>


                <li class="menu-title" key="t-menu">Sous-traitants</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-business"></i>
                        <span key="t-multi-level">Sous-traitants</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('contractors.index')}}" key="t-level-1-1">Tous les sous-traitants</a></li>
                        <li><a href="{{route('contractors.create')}}" key="t-level-1-1">Ajouter</a></li>
                    </ul>
                </li>
                <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-multi-level">Utilisateurs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('employees.index')}}" key="t-level-1-1">Tous les utilisateurs</a></li>
                        <li><a href="{{route('employees.create')}}" key="t-level-1-1">Ajouter</a></li>
                    </ul>
                </li>


                <li class="menu-title" key="t-menu">Suivi</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-analyse"></i>
                        <span>Analytique</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('analyze.index')}}" key="t-level-1-1">Visualisation</a></li>
                        <li><a href="{{route('analyze.details')}}" key="t-level-1-1">Détails</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="bx bx-list-check"></i>
                        <span>Quiz</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('quiz_questions.index')}}" key="t-level-1-1">Tous les quiz</a></li>
                        <li><a href="{{route('quiz_questions.create')}}" key="t-level-1-1">Ajouter</a></li>
                        <li><a href="{{route('employee_quiz_responses.index')}}" key="t-level-1-1">Réponses</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

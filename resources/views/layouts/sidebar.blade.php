<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('root') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-starter-page">Tableau de bord</span>
                    </a>
                </li>
                <li class="menu-title" key="t-menu">Transport</li>
                @can('doAdvanced')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-business"></i>
                        <span key="t-multi-level">Transporteurs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('carriers.index')}}" key="t-level-1-1">Tous les tranporteurs</a></li>
                    </ul>
                </li>
                @endcan
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-multi-level">Chauffeurs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('drivers.index')}}" key="t-level-1-1">Tous les chauffeurs</a></li>
                        <li><a href="{{route('drivers.create')}}" key="t-level-1-1">Ajouter</a></li>
                    </ul>
                </li>
                <li class="menu-title" key="t-menu">Particulier</li>
                @can('doAdvanced')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span key="t-multi-level">Particuliers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('particulars.index')}}" key="t-level-1-1">Tous les particuliers</a></li>
                        <li><a href="{{route('particulars.create')}}" key="t-level-1-1">Ajouter</a></li>
                    </ul>
                </li>
                @endcan
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
                        @can('doAdvanced')
                        <li><a href="{{route('quiz_questions.index')}}" key="t-level-1-1">Tous les quiz</a></li>
                        <li><a href="{{route('quiz_questions.create')}}" key="t-level-1-1">Ajouter</a></li>
                        @endcan
                        <li><a href="{{route('driver_quiz_responses.index')}}" key="t-level-1-1">Réponses</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

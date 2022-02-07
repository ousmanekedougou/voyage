@extends('admin.layouts.app')

@section('headsection')

@endsection

@section('main-content')

    <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Notifications</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                        <li class="breadcrumb-item active">Inbox</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <!-- Right Sidebar -->
                            <div class="col-12 mb-3">

                                <div class="card">
                                    <div class="btn-toolbar p-3" role="toolbar">
                                        <div class="btn-group me-2 mb-2 mb-sm-0">
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                                    class="fa fa-inbox"></i></button>
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                                    class="fa fa-exclamation-circle"></i></button>
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </div>
                                        <div class="btn-group me-2 mb-2 mb-sm-0">
                                            <button type="button"
                                                class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Updates</a>
                                                <a class="dropdown-item" href="#">Social</a>
                                                <a class="dropdown-item" href="#">Team Manage</a>
                                            </div>
                                        </div>
                                        <div class="btn-group me-2 mb-2 mb-sm-0">
                                            <button type="button"
                                                class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Updates</a>
                                                <a class="dropdown-item" href="#">Social</a>
                                                <a class="dropdown-item" href="#">Team Manage</a>
                                            </div>
                                        </div>

                                        <div class="btn-group me-2 mb-2 mb-sm-0">
                                            <button type="button"
                                                class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                More <i class="mdi mdi-dots-vertical ms-2"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Mark as Unread</a>
                                                <a class="dropdown-item" href="#">Mark as Important</a>
                                                <a class="dropdown-item" href="#">Add to Tasks</a>
                                                <a class="dropdown-item" href="#">Add Star</a>
                                                <a class="dropdown-item" href="#">Mute</a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="message-list">
                                        @foreach($contacts as $contact)
                                        <li class="unread">
                                            <div class="col-mail col-mail-1">
                                                <div class="checkbox-wrapper-mail">
                                                    <input type="checkbox" id="chk3">
                                                    <label for="chk3" class="toggle"></label>
                                                </div>
                                                <a href="#" class="title">{{$contact->name}}</a><span
                                                    class="star-toggle far fa-star"></span>
                                            </div>
                                            <div class="col-mail col-mail-2">
                                                <a href="#" class="subject"><span
                                                        class="bg-success badge me-2">
                                                            @if($contact->subject != null)
                                                            {{$contact->subject}}
                                                            @else
                                                            Pas d'objet
                                                            @endif
                                                        </span>Last pic over my
                                                    village –
                                                    <span class="teaser">Yeah i'd like that! Do you remember the video
                                                        you showed me of your train ride between Colombo and Kandy? The
                                                        one with the mountain view? I would love to see that one
                                                        again!</span>
                                                </a>
                                                <div class="date">5:01 am</div>
                                            </div>
                                        </li>
                                        @endforeach
                                       
                                        <li>
                                            <div class="col-mail col-mail-1">
                                                <div class="checkbox-wrapper-mail">
                                                    <input type="checkbox" id="chk8">
                                                    <label for="chk8" class="toggle"></label>
                                                </div>
                                                <a href="#" class="title">Medium</a><span
                                                    class="star-toggle far fa-star"></span>
                                            </div>
                                            <div class="col-mail col-mail-2">
                                                <a href="#" class="subject"><span
                                                        class="bg-primary badge me-2">Social</span>This Week's Top
                                                    Stories –
                                                    <span class="teaser">Our top pick for you on Medium this week The
                                                        Man Who Destroyed America’s Ego</span>
                                                </a>
                                                <div class="date">Feb 28</div>
                                            </div>
                                        </li>

                                       
                                    </ul>

                                </div> <!-- card -->

                                <div class="row">
                                    <div class="col-7">
                                        Showing 1 - 20 of 1,524
                                    </div>
                                    <div class="col-5">
                                        <div class="btn-group float-end">
                                            <button type="button" class="btn btn-sm btn-success waves-effect"><i
                                                    class="fa fa-chevron-left"></i></button>
                                            <button type="button" class="btn btn-sm btn-success waves-effect"><i
                                                    class="fa fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end Col-9 -->

                        </div>

                    </div><!-- End row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

@endsection


@section('footersection')

@endsection
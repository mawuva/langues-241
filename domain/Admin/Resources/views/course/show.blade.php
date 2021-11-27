
@component('admin::components.layouts.course-details', compact('course'))
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#activity" data-toggle="tab">
                        {{ trans_choice('entity.chapter', 2) }}
                    </a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="#timeline" data-toggle="tab">
                        Timeline
                    </a>
                </li> -->
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    @include('admin::course.section.chapters')
                </div>
                <div class="tab-pane" id="timeline">
    
                </div>
            </div>
        </div>
    </div>
@endcomponent


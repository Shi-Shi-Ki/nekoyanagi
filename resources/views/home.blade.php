@include('common_header')
    <body>
        {{-- c_navfeatureの設定にあるz-indexを高い値にしておくことで他の要素と被らなくなる --}}
        <nav class="c_navfeature">
            <div class="nav-wrapper">
                &nbsp;&nbsp;<a href="#" class="brand-logo"><i class="material-icons">home</i>My Page</a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <nav class="z-depth-0">
                          <div class="nav-wrapper">
                            <form>
                              <div class="input-field">
                                <input id="search" type="search" size="50">
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                              </div>
                            </form>
                          </div>
                        </nav>
                    </li>
                    <li><a href="#"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </nav>
        <div class="row" style="margin:80px 0px 0px 0px;">
          <div class="col s6 c_blockScrollTree">
            <ul id="tree_list" class="collection c_collection_visible z-depth-2">
              @foreach($data as $rows)
                <li class="collection-item avatar">
                  <i class="material-icons circle green">insert_chart</i>
                  <span class="title">{{ $rows['title'] }}</span>
                  <p>{{ $rows['comment'] }}<br/>{{ $rows['created_at'] }}</p>
                  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                </li>
              @endforeach
              <li>
                <a class="btn-floating halfway-fab waves-effect waves-light red">
                  <i class="material-icons modal-trigger" data-target="j_create_tree_modal">add</i>
                </a>
              </li>
            </ul>
          </div>
		  <div class="col s6">
<p>aaa</p>
          </div>
        </div>

  <div id="j_create_tree_modal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Create Tree</h4>
      <div class="col s6">
        <form id="create_tree_form">
          <div class="row">
            <div class="input-field col s12">
              <input id="tree_title" type="text" class="validate">
              <label for="tree_title">Title</label>
            </div>
            <div class="input-field col s12">
              <input id="tree_comment" type="text" class="validate">
              <label for="tree_comment">Comment</label>
            </div>
            <div class="input-field col s12">
              <button type="button" id="j_exec_create_tree" class="waves-effect waves-light btn">Create</button>
            </div>
          </div> 
{{--
          <div class="input-field col s12">
          </div>        
--}}
        </form>
      </div>
    </div>
    {{-- ここに置かないとfloat状態にならない --}}
    <div class="progress c_approach_top c_hide j_loading">
      <div class="indeterminate"></div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>

    </body>
@include('common_footer')

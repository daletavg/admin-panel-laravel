<div class="card m-2">
    <div id="shared-lists" class="row  m-3">
        <div class="col-6 card" data-update-url="{{route('admin.ajax.group')}}" data-parent-table="poster_group"
             data-parent-id="{{$edit->id??''}}"
             data-child-table="posters">
            <div class="m-2">
                <label for="fromTo" class=" control-label ">Все афиши</label>
                <div id="fromTo" class="list-group ml-2" style="min-height: 200px; max-height:400px;overflow-y: auto;">
                    @foreach ($posters as $poster)
                        <div class="list-group-item bg-secondary rounded m-2 text-white "
                             data-id="{{$poster->id}}">
                            <div class="d-flex justify-content-between align-items-center">
                                {{$poster->lang->title}}
                                <a
                                    href="{{route('admin.posters.edit',$poster)}}"><i
                                        class="btn btn-primary fas fa-edit "></i></a>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-6 card">
            <div class="m-2">
                <label for="addTo" class=" control-label">Афиши в текущщей группе</label>
                <div id="addTo" class="list-group col" style="min-height: 200px; max-height:400px;overflow-y: auto;">
                    @foreach($edit->poster as $posterGroup)
                        <div class="list-group-item bg-secondary rounded m-2 text-white "
                             data-id="{{$posterGroup->id}}">
                            <div class="d-flex justify-content-between align-items-center">
                                {{$posterGroup->lang->title}}
                                <a
                                    href="{{route('admin.posters.edit',$posterGroup)}}"><i
                                        class="btn btn-primary fas fa-edit "></i></a>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

@section('javascript')
    <script>


        $(function () {

            new Sortable(document.getElementById('fromTo'), {
                group: 'shared', // set both lists to same group
                animation: 150,
                onAdd: function (/**Event*/evt) {
                    const myArray = []
                    $('#fromTo div').each((i, item) => {
                        myArray.push($(item).attr('data-id'))
                    })

                    let url = $('[data-update-url]').attr('data-update-url');
                    console.log(myArray);
                    let sendData = {
                        childTable: $('[data-child-table]').attr('data-child-table'),
                        parentTable: $('[data-parent-table]').attr('data-parent-table'),
                        dataId: myArray
                    };
                    $.post({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: url,
                            data: sendData,
                            dataType: "json",
                            cache: false,
                            success: function (res) {
                                if (res.status === 'success') {
                                    messageResponse(res);
                                }
                            }

                        }
                    )
                },

            });

            new Sortable(document.getElementById('addTo'), {
                group: 'shared',
                animation: 150,
                onAdd: function (/**Event*/evt) {
                    const myArray = []
                    $('#addTo div').each((i, item) => {
                        myArray.push($(item).attr('data-id'))
                    })

                    let url = $('[data-update-url]').attr('data-update-url');
                    console.log(myArray);
                    let sendData = {
                        childTable: $('[data-child-table]').attr('data-child-table'),
                        parentTable: $('[data-parent-table]').attr('data-parent-table'),
                        parentId: $('[data-parent-id]').attr('data-parent-id'),
                        dataId: myArray
                    };
                    $.post({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: url,
                            data: sendData,
                            dataType: "json",
                            cache: false,
                            success: function (res) {
                                if (res.status === 'success') {
                                    messageResponse(res);
                                }
                            }

                        }
                    )
                },

            });


            // sort = {
            //     getInstance : function () {
            //         return Object.assign({}, this);
            //     },
            //     'container': '[data-sortable-container]',
            //     'handle': '.handle',
            //     'draggable': '.draggable',
            //     'single': '[data-sort]',
            //     'url': '/admin/ajax/sort',
            //     'init': function () {
            //         $this = this;
            //         $sortable = document.querySelectorAll(this.container);
            //         if (!$sortable.length) return false;
            //         $sortable.forEach(function ($container) {
            //             Sortable.create($container, {
            //                 draggable: $this.draggable,
            //                 handle: $this.handle,
            //                 onUpdate: $this.onUpdateSort
            //             });
            //
            //         });
            //     },
            //     'onUpdateSort':function (e) {
            //         $sortArray = [];
            //         $wrapper = $(e.target);
            //         $table = $wrapper.data('table');
            //         $rows = $wrapper.find($this.single);
            //         $.each($rows, function ($key, $row) {
            //             $id = $($row).data('id');
            //             $sortArray[$key] = $id;
            //         });
            //         if ($sortArray && $table) {
            //             $this.update($table, $sortArray);
            //         }
            //     },
            //     'update': function ($table, $sortArray) {
            //         $this = this;
            //         if (!$table || !$sortArray) return false;
            //         let $query = '';
            //         $sortArray = JSON.stringify($sortArray);
            //         $query = 'sort=' + $sortArray + '&' + 'table=' + $table;
            //         $.post({
            //             url: $this.url,
            //             data: $query,
            //             dataType: "json",
            //             cache: false,
            //             success: function (res) {
            //                 if (res.status === 'success') {
            //                     $this.onUpdateSuccess(res);
            //                 }
            //             }
            //         });
            //     },
            //     'onUpdateSuccess': function (data) {
            //         messageResponse(data);
            //     }
            // };


            // $('.connected').sortable({
            //     connectWith: '.connected',
            // }).bind('sortupdate', function () {
            //     console.log(1);
            // });


            // $('.exclude').sortable({
            //     items: ':not(.disabled)'
            // });
        });

    </script>
@stop

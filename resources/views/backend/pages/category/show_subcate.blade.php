<div class="modal-header py-3 px-4 border-bottom-0">
    <h5 class="modal-title" id="modal-title"><b>{{$data->name}}</b></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
</div>
<div class="modal-body p-4">
    <div class="table-responsive">
        <div class="show_table">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th class="text-center" style="width:10%">No.</th>
                        <th style="width:20%">Sub Category</th>
                        <th class="text-center" style="width:10%">Color</th>
                        <th class="text-center" style="width:10%">Sataus</th>
                        {{-- <th class="text-center" style="width:20%">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if($rows)
                    @php $i=0; @endphp
                    @foreach($rows as $row)
                    @php $i++; @endphp
                    <tr>
                        <td class="w-10 text-center">{{@$i}}</td>
                        <td class="w-20">{{strtoupper($row->name)}}</td>
                        <td class="w-10 text-center"><input type='color' value='{{$row->color}}' class='form-control' disabled ></td>
                        <td class="w-20 text-center">{{$row->status}}</td>
                        {{-- <td class="w-40 text-center">
                            <a href="{{url("$segment/$folder/$row->id/edit-sub")}}" class="btn btn-sm btn-info" title="Edit"><i class='fa fa-edit'></i> Edit</a>
                            <a href="javascript:" class="btn btn-sm btn-danger" onclick="deleteItem_sub('{{$row->id}}')" title="Delete"><i class="far fa-trash-alt"></i> Delete</a>

                        </td> --}}
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 text-end">
            <button type="button" class="btn btn-light me-1" data-tw-dismiss="modal">Close</button>
        </div>
    </div>
</div>

@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row py-3">
            {{-- Input Colum start --}}
            <div class="col-sm-8 offset-2">
                <div class="card">
                    <div class="card-header  bg-light d-flex justify-content-between">
                        <h6 class="card-title text-dark">Update Asset  Information</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('asset.update',$assets->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-xm-3">Asset Type Name<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select name="assettype_id"
                                                class="form-control @error('assettype_id')is-invalid @enderror" type="text">
                                                <option value="">Select Asset type </option>
                                                @foreach ($asset_types as $asset_type )
                                                <option value="{{$asset_type->id}}" @if ($asset_type->id ==$assets->assettype_id ) selected

                                                @endif>{{$asset_type->asset_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('assettype_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text">Sub Asset Type<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select class="form-control @error('sub_asset') is-invalid @enderror"
                                                name="sub_asset">
                                                <option>Select asset_types </option>
                                                @foreach ($sub_asset_types as $sub_assettype )
                                                <option value="{{$sub_assettype->id}}" @if ($sub_assettype->id == $assets->sub_asset ) selected

                                                @endif>{{$sub_assettype->name}}</option>
                                                @endforeach
                                            </select>
                                            <x-error name='sub_asset' />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xm-4">Asset Name<span class="text-danger">*</span></label>
                                <input name="name" class="col-xm-8 form-control @error('name')is-invalid @enderror"
                                    type="text" value="{{$assets->name}}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Price<span class="text-danger">*</span></label>
                                <input name="price" class="col-xm-9 form-control  @error('price')is-invalid @enderror"
                                    type="text" value="{{$assets->price}}" placeholder="Enter your price">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Buy Date<span class="text-danger">*</span></label>
                                <input name="buy_date" class="col-xm-9 form-control  @error('buy_date')is-invalid @enderror"
                                    type="datetime-local" value="{{$assets->buy_date->format('Y-m-d')."T".$assets->buy_date->format('H:i')}}">
                                @error('buy_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Expiry Date<span class="text-danger">*</span></label>
                                <input name="expiry_date"
                                    class="col-xm-9 form-control @error('expiry_date')is-invalid @enderror" type="datetime-local"
                                    placeholder="Enter your price " value="{{$assets->expiry_date->format('Y-m-d')."T".$assets->expiry_date->format('H:i')}}">
                                @error('expiry_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Warranty date<span class="text-danger">*</span></label>
                                <input name="warranty_date"
                                    class="col-xm-9 form-control @error('warranty_date')is-invalid @enderror" type="text"
                                    value="{{$assets->warranty_date}}" placeholder="Enter your Warranty time ">
                                @error('warranty_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Serial Number</label>
                                <input name="serial" class="col-xm-9 form-control @error('serial')is-invalid @enderror"
                                    type="integer"  value="{{$assets->serial}}" placeholder="Enter your serial number ">
                                @error('serial')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Additional information</label>
                                <textarea id="summernote" name="additional_information" type="text"
                                    class="form-control @error('additional_information')is-invalid @enderror"
                                    rows="3">{{$assets->additional_information}}</textarea>
                                @error('additional_information')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Remarks</label>
                                <textarea  name="remarks" type="text"
                                class="form-control @error('remarks')is-invalid @enderror"
                                rows="3">{{$assets->remarks}}</textarea>
                                @error('remarks')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm mt-3">
                                <div class="form-group form-group-margin text-right">
                                    <button type="reset" class="btn bg-danger ml-3 mb-2">Reset</button>
                                    <button type="submit" class="btn bg-blue ml-1 mb-2">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            {{-- Input Colum End --}}
        </div>

    </div>

@endsection
@push('script')
    <script>
        var assettype_id = $('select[name="assettype_id"]');
        var sub_assetid = $('select[name="sub_asset"]');

        $(document).on('change', 'select[name="assettype_id"]', function() {
            assettypeid = assettype_id.val();
            if(assettypeid){
                $.ajax({
                    url: `/subassetbyasset/${assettypeid}`,
                    type: 'GET',
                    // dataType: 'JSON',
                    success: function(data) {
                        if (data) {
                            sub_assetid.empty()
                            data.forEach(function(cat){
                                sub_assetid.append(`<option value="${cat.id}">${cat.name}</option>`)
                            })
                        }
                    },
                    fail: function(err) {
                        if (err) {
                            console.log(err);
                        }
                    }
                })
            }
        });


    </script>

@endpush

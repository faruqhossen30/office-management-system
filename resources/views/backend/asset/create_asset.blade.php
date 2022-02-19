@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row py-3">
            {{-- Input Colum start --}}
            <div class="col-sm-8 offset-2">
                <div class="card">
                    <div class="card-header bg-light d-flex justify-content-between p-2 pl-3">
                        <h6 class="font-weight-semibold">Add Asset Information</h6>
                        <a href="{{ route('asset.index') }}" type="button"
                            class="btn btn-light btn-sm btn-labeled btn-labeled-left"><b><i
                                    class="icon-menu7"></i></b>List</a>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('asset.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-xm-3">Asset Type Name<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select name="assettype_id"
                                                class="form-control @error('assettype_id')is-invalid @enderror" type="text">
                                                <option value="">Select Asset type </option>
                                                @foreach ($asset_types as $asset_type)
                                                    <option value="{{ $asset_type->id }}">{{ $asset_type->asset_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-error name='assettype_id' />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text">Sub Asset Type<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select class="form-control @error('subasset_id') is-invalid @enderror"
                                                name="subasset_id">
                                                <option>Select asset_types </option>
                                            </select>
                                            <x-error name='subasset_id' />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="col-xm-4">Asset Name<span class="text-danger">*</span></label>
                                <input name="name" class="col-xm-8 form-control @error('name')is-invalid @enderror"
                                    type="text" placeholder="Enter your asset name" value="{{ old('name') }}">
                                <x-error name='name' />

                            </div>

                            <div class="form-group">
                                <label class="col-xm-3">Price<span class="text-danger">*</span></label>
                                <input name="price" class="col-xm-9 form-control  @error('price')is-invalid @enderror"
                                    type="number" placeholder="Enter your price" value="{{ old('price') }}">
                                <x-error name='price' />
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Buy Date<span class="text-danger">*</span></label>
                                <input name="buy_date" class="col-xm-9 form-control  @error('buy_date')is-invalid @enderror"
                                    type="date" placeholder="Enter your price" value="{{ old('buy_date') }}">
                                <x-error name='buy_date' />
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Expiry Date<span class="text-danger">*</span></label>
                                <input name="expiry_date"
                                    class="col-xm-9 form-control @error('expiry_date')is-invalid @enderror"
                                    type="date" placeholder="Enter your price" value="{{ old('expiry_date') }}">
                                <x-error name='expiry_date' />
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Warranty/
                                    guarantee <span class="text-danger">*</span></label>
                                <input name="warranty_date"
                                    class="col-xm-9 form-control @error('warranty_date')is-invalid @enderror" type="text"
                                    placeholder="Enter your Warranty time" value="{{ old('warranty_date') }}">
                                <x-error name='warranty_date' />
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Serial Number</label>
                                <input name="serial" class="col-xm-9 form-control @error('serial')is-invalid @enderror"
                                    type="text" placeholder="Enter your serial number" value="{{ old('serial') }}">
                                <x-error name='serial' />
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Additional information</label>
                                <textarea name="additional_information" type="text"
                                    class="form-control @error('additional_information')is-invalid @enderror"
                                    rows="3">{{ old('additional_information') }}</textarea>
                                <x-error name='additional_information' />
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Remarks</label>
                                <textarea name="remarks" type="text"
                                    class="form-control @error('remarks')is-invalid @enderror"
                                    rows="3">{{ old('remarks') }}</textarea>
                                <x-error name='remarks' />
                            </div>
                            <div class="col-sm mt-3">

                                <div class="form-group form-group-margin text-right">
                                    <button type="reset" class="btn bg-danger ml-3 mb-2">Reset</button>
                                    <button type="submit" class="btn bg-blue ml-1 mb-2">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
@push('script')
    <script>
        var assettype_id = $('select[name="assettype_id"]');
        var sub_assetid = $('select[name="subasset_id"]');

        $(document).on('change', 'select[name="assettype_id"]', function() {
            assettypeid = assettype_id.val();
            if (assettypeid) {
                $.ajax({
                    url: `/subassetbyasset/${assettypeid}`,
                    type: 'GET',
                    // dataType: 'JSON',
                    success: function(data) {
                        if (data) {
                            sub_assetid.empty()
                            data.forEach(function(cat) {
                                sub_assetid.append(
                                    `<option value="${cat.id}">${cat.name}</option>`)
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

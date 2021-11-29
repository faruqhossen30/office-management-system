@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row py-3">
            {{-- Input Colum start --}}
            <div class="col-sm-8 offset-2">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('asset.store') }}" method="POST">
                            @csrf
                            <h5 style="background: rgb(70, 27, 223) ; size:30px">
                                <center><b style="color: white; ">Add Asset</b></center>
                            </h5>
                            <div class="form-group">
                                <label class="col-xm-4">Asset Name*</label>
                                <input name="name" class="col-xm-8 form-control @error('name')is-invalid @enderror"
                                    type="text" placeholder="Enter your asset name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Asset Type Name*</label>
                                <div class="form-group">
                                    <select name="assettype_id"
                                        class="form-control @error('assettype_id')is-invalid @enderror" type="text">
                                        <option value="">Select Asset type </option>
                                        @foreach ($asset_types as $asset_type )
                                        <option value="{{$asset_type->id}}">{{$asset_type->asset_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('assettype_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Price*</label>
                                <input name="price" class="col-xm-9 form-control  @error('price')is-invalid @enderror"
                                    type="text" placeholder="Enter your price ">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Buy Date*</label>
                                <input name="buy_date" class="col-xm-9 form-control  @error('buy_date')is-invalid @enderror"
                                    type="datetime-local" placeholder="Enter your price ">
                                @error('buy_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Expiry Date*</label>
                                <input name="expiry_date"
                                    class="col-xm-9 form-control @error('expiry_date')is-invalid @enderror" type="datetime-local"
                                    placeholder="Enter your price ">
                                @error('expiry_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Warranty date*</label>
                                <input name="warranty_date"
                                    class="col-xm-9 form-control @error('warranty_date')is-invalid @enderror" type="text"
                                    placeholder="Enter your Warranty time ">
                                @error('warranty_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Serial Number*</label>
                                <input name="serial" class="col-xm-9 form-control @error('serial')is-invalid @enderror"
                                    type="integer" placeholder="Enter your serial number ">
                                @error('serial')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-xm-3">Additional information*</label>
                                <textarea id="summernote" name="additional_information" type="text"
                                    class="form-control @error('additional_information')is-invalid @enderror"
                                    rows="3"></textarea>
                                @error('additional_information')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm mt-3">
                                <div class="form-group">
                                    <label class="col-xm-3">Remarks*</label>
                                    <input name="remarks"
                                        class="col-xm-9 form-control  @error('remarks')is-invalid @enderror" type="text"
                                        placeholder="Enter your serial number ">
                                    @error('remarks')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group form-group-margin text-right">
                                    <button type="reset" class="btn bg-danger ml-3 mb-2">Reset</button>
                                    <button type="submit" class="btn bg-blue ml-1 mb-2">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            {{-- Input Colum End --}}
            {{-- <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h5>
                            <center>Asset Type List</center>
                        </h5>

                        <table class="table datatable-html">
                            <thead>
                                <tr>
                                    <th>sL</th>
                                    <th>Asset Name</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th scope="row"></th>
                                    <td>hgfghf</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-success btn-sm">View</a>
                                        <a href="#" class="btn btn-warning btn-sm"> Edit
                                        </a>
                                        <form action="#" method="POST" style="display: inline-flex">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick=" return confirm('Are you  shure to delete?')"
                                                class="btn btn-danger btn-sm"> Delete </button>
                                        </form>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>

@endsection

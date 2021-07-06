@extends('layouts.app')

@section('content')
   
    <section>

    <form action="{{ route('product.update', $product) }}" method="post">
                @csrf
                @method('put')
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="title"  value="{{ old('title') ?: $product->title }}" placeholder="Product Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Product SKU</label>
                            <input type="text" name="sku" value="{{ old('sku') ?: $product->sku }}" placeholder="Product Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea  name="description"  id="" cols="30" rows="4" class="form-control"> {{ old('description') ?: $product->description }}" </textarea>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Media</h6>
                    </div>
                    <div class="card-body border">
                        <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
            
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Variants</h6>
                    </div>
                    <div class="card-body">
                        <div class="row" v-for="(item,index) in product_variant">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Option</label>
                                    <select class="form-control">
                                        <option>
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="float-right text-primary"
                                           style="cursor: pointer;">Remove</label>
                                    <label > </label>
                                    <input-tag class="form-control"></input-tag>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button  class="btn btn-primary">Add another option</button>
                    </div>



                    <div class="card-header text-uppercase">Preview</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Variant</td>
                                    <td>Price</td>
                                    <td>Stock</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr >
                                    <td></td>
                                    <td>
                                        <input type="text" class="form-control" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                 <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
          </form>




    </section>
@endsection

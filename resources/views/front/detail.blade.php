@extends('interface')
@section('content')
    <div class="card">
        <div class="card-body">

            <div class="row">
                {{-- @foreach ($articles as $article) --}}
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center">
                        <img src="{{ asset('storage/upload/' . $article->image) }}" width="100%" class="img-responsive"
                        height="100%" class="img-fluid rounded" alt="...">
                    </div>

                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h2 class="box-title mt-5">{{ $article->nom }} </h2>
                    <p>{{ $article->description }}</p>
                    <h2 class="mt-5">
                       <small class="text-success">Prix : {{ $article->prix }} €</small>
                    </h2>

                    <button class="btn btn-primary btn-rounded">Buy Now</button>
                    <h3 class="box-title mt-5">Key Highlights</h3>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success"></i>Sturdy structure</li>
                        <li><i class="fa fa-check text-success"></i>Designed to foster easy portability</li>
                        <li><i class="fa fa-check text-success"></i>Perfect furniture to flaunt your wonderful collectibles</li>
                    </ul>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="box-title mt-5">Caractéristiques</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-product">
                            <tbody>
                                <tr>
                                    <td width="390">Brand</td>
                                    <td>Stellar</td>
                                </tr>
                                <tr>
                                    <td>Delivery Condition</td>
                                    <td>Knock Down</td>
                                </tr>
                                <tr>
                                    <td>Seat Lock Included</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>Office Chair</td>
                                </tr>
                                <tr>
                                    <td>Style</td>
                                    <td>Contemporary&amp;Modern</td>
                                </tr>
                                <tr>
                                    <td>Wheels Included</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Upholstery Included</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Upholstery Type</td>
                                    <td>Cushion</td>
                                </tr>
                                <tr>
                                    <td>Head Support</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td>Suitable For</td>
                                    <td>Study&amp;Home Office</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>

@endsection

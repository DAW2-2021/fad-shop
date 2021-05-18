@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <!-- CART -->
    <div class="container-fluid">
        <div class="col-md text-center p-4">
            <p class="h3">Order Details</p>
        </div>
        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">
                                        Quantity
                                    </th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside">
                                                <img src="" class="img-thumbnail" />
                                            </div>
                                            <!-- arreglar las fotos en laravel -->
                                            <figcaption class="info">
                                                <a href="#" class="title text-dark" data-abc="true">Tshirt with round
                                                    nect</a>
                                                <p class="text-muted small">
                                                    SIZE: L <br />
                                                    Brand: MAXTRA
                                                </p>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">$10.00</var>
                                            <small class="text-muted">
                                                $9.20 each
                                            </small>
                                        </div>
                                    </td>
                                    <td class="text-right d-none d-md-block">
                                        <button class="btn btn-danger remove">
                                            Remove
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside">
                                                <img src="https://i.imgur.com/hqiAldf.jpg" class="img-sm" />
                                            </div>

                                            <figcaption class="info">
                                                <a href="#" class="title text-dark" data-abc="true">Flower Formal
                                                    T-shirt</a>
                                                <p class="text-muted small">
                                                    SIZE: L <br />
                                                    Brand: ADDA
                                                </p>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">$15</var>
                                            <small class="text-muted">
                                                $12 each
                                            </small>
                                        </div>
                                    </td>
                                    <td class="text-right d-none d-md-block">
                                        <button class="btn btn-danger remove">
                                            Remove
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside">
                                                <img src="https://i.imgur.com/UwvU0cT.jpg" class="img-sm" />
                                            </div>

                                            <figcaption class="info">
                                                <a href="#" class="title text-dark" data-abc="true">Printed White Tshirt</a>
                                                <p class="small text-muted">
                                                    SIZE:M <br />
                                                    Brand: Cantabil
                                                </p>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">$9</var>
                                            <small class="text-muted">
                                                $6 each</small>
                                        </div>
                                    </td>
                                    <td class="text-right d-none d-md-block">
                                        <button class="btn btn-danger remove">
                                            Remove
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
            <!-- aside derecha -->
            <aside class="col-lg-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Have coupon?</label>
                                <div class="input-group">
                                    <input type="text" class="form-control coupon" name="" placeholder="Coupon code" />
                                    <span class="input-group-append">
                                        <button class="btn btn-primary btn-apply coupon">
                                            Apply
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right ml-3">$69.97</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger ml-3">
                                - $10.00
                            </dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right text-dark b ml-3">
                                <strong>$59.97</strong>
                            </dd>
                        </dl>
                        <hr />
                        <a href="#" class="btn btn-out btn-primary btn-square btn-main" data-abc="true">
                            Make Purchase
                        </a>
                        <a href="#" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue
                            Shopping</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
@section('extraFooter')

@endsection
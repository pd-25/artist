@extends('admin.layout.main')
@section('title', env('APP_NAME') . ' | Artist-create')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card">
                <div class="card-title">
                    <h4>Create Expenses</h4>
                    @if (Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.AddexpensesPost') }}" method="POST" enctype="multipart/form-data" name="Expensesform">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Note</label><span class="text-danger">*</span>
                                        <textarea name="note" class="form-control" required> </textarea>
                                        @error('note')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Expense Items</label><span class="text-danger">*</span>
                                        <select name="expense_items" class="form-control" required>
                                            <option value="advertising">Advertising</option>
                                            <option value="ink">Ink</option>
                                            <option value="tools">Tools</option>
                                            <option value="clothing">Clothing</option>
                                            <option value="insurance">Insurance</option>
                                            <option value="ccfees">CC Fees</option>
                                        </select>
                                        @error('expense_items')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>


                            </div>








                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

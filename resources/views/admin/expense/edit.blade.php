@extends('admin.layout.main')
@section('title', env('APP_NAME') . ' | Category-edit')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card">
                <div class="card-title">
                    <h4>Edit Payment</h4>
                    @if (Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.editexpensesPost', encrypt($expenses->id)) }}" method="POST" enctype="multipart/form-data">
                            @csrf




                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Note</label><span class="text-danger">*</span>
                                        <textarea name="note" class="form-control" required> <?php echo $expenses->note ?></textarea>
                                        @error('note')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Expense Items</label><span class="text-danger">*</span>
                                        <select name="expense_items" class="form-control" required>
                                            <option value="advertising" @if($expenses->expense_items == 'advertising') selected @endif>Advertising</option>
                                            <option value="ink"  @if($expenses->expense_items == 'ink') selected @endif>Ink</option>
                                            <option value="tools"  @if($expenses->expense_items == 'tools') selected @endif>Tools</option>
                                            <option value="clothing"  @if($expenses->expense_items == 'clothing') selected @endif>Clothing</option>
                                            <option value="insurance"  @if($expenses->expense_items == 'insurance') selected @endif>Insurance</option>
                                            <option value="ccfees"  @if($expenses->expense_items == 'ccfees') selected @endif>CC Fees</option>
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

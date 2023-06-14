@extends('layouts.add')
@section('add')
                                    <form class="user" method="POST" action="{{ route('store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="nama" class="form-control form-control-user" placeholder="Enter Name.....">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="rumah_sakit" id="hospital" class="form-control form-control-user" placeholder="Enter Hospital....." disabled>
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="rujukan" class="custom-control-input" id="rujukan" value="1" onchange="toggleInput()">
                                                <label style="
                                                    -moz-user-select: none;
                                                    -webkit-user-select: none;
                                                    -ms-user-select: none;
                                                    user-select: none;
                                                    " class="custom-control-label" for="rujukan">Rujukan</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="obat" class="form-control form-control-user" placeholder="Enter Medicine.....">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="harga_satuan" class="form-control form-control-user mt-1" placeholder="Enter Unit Price .....">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="apoteker" class="form-control form-control-user mt-1" placeholder="Enter Pharmacist .....">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Submit
                                        </button>
                                    </form>
                                @endsection

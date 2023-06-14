@extends('layouts.add')
@section('add')

                                        <form class="user" method="POST" action="{{ route('update', $data['id']) }}">
                                            @csrf
                                            <div class="form-group">
                                                <input value="{{ $data['nama'] }}" type="text" name="nama" class="form-control form-control-user" placeholder="Enter Name.....">
                                            </div>
                                            <div class="form-group">
                                                <input value="{{ $data['rumah_sakit'] }}" type="text" name="rumah_sakit" id="hospital" class="form-control form-control-user" placeholder="Enter Hospital....." @if($data['rujukan'] != 1) disabled @endif>
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" name="rujukan" class="custom-control-input" id="rujukan" value="1" onchange="toggleInput()" @if($data['rujukan'] == 1) checked @endif>
                                                    <label style="
                                                        -moz-user-select: none;
                                                        -webkit-user-select: none;
                                                        -ms-user-select: none;
                                                        user-select: none;
                                                        " class="custom-control-label" for="rujukan">Rujukan</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input value="{{ implode(', ', $data['obat']) }}" type="text" name="obat" class="form-control form-control-user" placeholder="Enter Medicine.....">
                                            </div>
                                            <div class="form-group">
                                                <input value="{{ implode(', ', $data['harga_satuan']) }}" type="text" name="harga_satuan" class="form-control form-control-user mt-1" placeholder="Enter Unit Price .....">
                                            </div>
                                            <div class="form-group">
                                                <input value="{{ $data['apoteker'] }}" type="text" name="apoteker" class="form-control form-control-user mt-1" placeholder="Enter Pharmacist .....">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Submit
                                            </button>
                                        </form>

                                                @endsection

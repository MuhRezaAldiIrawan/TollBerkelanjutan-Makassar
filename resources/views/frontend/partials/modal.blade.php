<div class="modal fade text-left" id="kartu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="{{route('kartu-store')}}">
                @csrf
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                <div class="modal-header">
                    <button type="button" id="addRow" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>
                    <button type="button" id="removeRow" class="btn btn-sm btn-danger ml-2"><i class="fa fa-times"></i></button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th style="visibility: hidden;">
                                    <div class="checkbox auth-checkbox">
                                        <input class="cek-kartu" type="checkbox" name="" id="auth-ligin">
                                        <label for="auth-ligin"></label>
                                    </div>
                                </th>
                                <th>Bank</th>
                                <th>Kartu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="checkbox auth-checkbox">
                                        <input type="checkbox" class="item-row" id="auth-ligin_1">
                                        <label for="auth-ligin_1"></label>
                                    </div>
                                </td>
                                <td>
                                    <select name="bank[]" id="bank_1" required class="form-control">
                                        <option selected="true" disabled>Pilih Bank</option>
                                        @foreach($data_bank as $db)
                                        <option value="{{$db->id}}">{{$db->bank}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="kartu[]" placeholder="Masukan Nomor Kartu Anda" class="form-control" id="kartu_1" required>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-light-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="{{route('profile-update')}}">
                @csrf
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <textarea class="form-control mb-2" name="alamat" id="alamat" placeholder="Masukan Alamat Anda"></textarea>
                        <label for="Telpon">Telpon</label>
                        <input type="text" name="telpon" id="telpon" class="form-control mb-2">
                        <label for="Password">Password</label>
                        <input type="password" name="password" id="password" class="form-control mb-2" placeholder="Isi jika ingin mengganti password">
                        <label for="Password">Password Confirmation</label>
                        <input type="password" name="password" id="password_confirm" class="form-control mb-2" placeholder="Isi jika ingin mengganti password">
                        <span id="message" class="" style="visibility: hidden;">Password Tidak Sama</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn bg-light-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="save" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<form action={{url('/admin/report/print')}}  target="_blank" method="GET" enctype="multipart/form-data" >
    @csrf
    <div class="row">
        <div class="col-lg-5">
            <div class="form-group">
            <label>Dari Tanggal</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <input placeholder="masukkan tanggal Awal" type="date" class="form-control datepicker" name="from" value = "{{date('Y-m-d')}}">
                </div>
            </div>
            <div class="form-group">
            <label>Sampai Tanggal</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <input placeholder="masukkan tanggal Akhir" type="date" class="form-control datepicker" name="to" value = "{{date('Y-m-d')}}">
                </div>
            </div>
        </div>
    </div>
    <Button  type="submit"  class="btn btn-primary" value="Proses" >Print</Button>
  </form>
  
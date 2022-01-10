<div class="p-6 sm:px-20 bg-white border-b border-gray-200">

    <div class="mt-8 text-2xl">
        Hello Administrator..!!
    </div>

</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                <a href="{{ route('users.index') }}">Data Karyawan</a>
            </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Jumlah Karyawan
            </div>
        </div>
    </div>

    <div class="p-6">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a
                    href="{{ route('absensi.index') }}">Data
                    Presensi Karyawan</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Informasi Presensi Karyawan
            </div>
        </div>
    </div>

    <div class="p-6">
        <div class="flex items-center">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('izin.index') }}">Data
                    Izin Karyawan</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Informasi Izin Karyawan
            </div>
        </div>
    </div>

</div>

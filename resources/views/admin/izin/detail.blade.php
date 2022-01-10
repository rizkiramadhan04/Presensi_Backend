<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Izin &raquo; {{ $item->jenis_izin }} by {{ $item->users->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('izin.index') }}" class="text-gray-800 font-bold py-2 px-4 rounded">
                    Back
                </a>
            </div>

            <div class="w-full rounded overflow-hidden shadow-lg px-6 py-6 bg-white">
                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">

                    <div class="w-full md:w-5/6 px-4 mb-4 md:mb-0 ">

                        <div class="flex flex-wrap mb-3">
                            <div class="w-2/6">
                                <div class="text-sm">Nama Karyawan</div>
                                <div class="text-xl font-bold">{{ $item->users->name }}</div>
                            </div>
                            <div class="w-2/6">
                                <div class="text-sm">Jabatan</div>
                                <div class="text-xl font-bold">{{ $item->users->jabatan }}</div>
                            </div>
                            <div class="w-2/6">
                                <div class="text-sm">Jenis Izin</div>
                                <div class="text-xl font-bold">{{ $item->jenis_izin }}</div>
                            </div>
                            <div class="w-2/6">
                                <div class="text-sm">Waktu Izin</div>
                                <div class="text-xl font-bold">{{ $item->jenis_hari }}</div>
                            </div>
                            <div class="w-2/6">
                                <div class="text-sm">Tanggal Awal</div>
                                <div class="text-xl font-bold">{{ $item->tanggal_awal }}</div>
                            </div>
                            <div class="w-2/6">
                                <div class="text-sm">Tanggal Akhir</div>
                                <div class="text-xl font-bold">{{ $item->tanggal_akhir }}</div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mb-3">
                            <div class="w-2/6">
                                <div class="text-sm">Nomor Phone</div>
                                <div class="text-xl font-bold">{{ $item->users->phoneNumber }}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

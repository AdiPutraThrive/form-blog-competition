<?php

use function Livewire\Volt\{state};
use App\Models\Participant;
use function Laravel\Folio\name;

name('participants.index');

state(['participants' => fn() => Participant::latest()->get()])->url();

?>


<x-admin-layout>
    <x-slot name="title">Laporan Blog Competition 2024</x-slot>
    @include('layouts.table')
    @volt
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="#">Peserta</a>
                    </li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table display text-center text-nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Whatsapp</th>
                                    <th>Status</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants as $no => $item)
                                    <tr>
                                        <th>{{ ++$no }}</th>
                                        <th>{{ $item->fullname }}</th>
                                        <th>{{ $item->email }}</th>
                                        <th>{{ $item->whatsapp }}</th>
                                        <th>
                                            <span
                                                class="badge {{ $item->status == 'MENUNGGU' ? 'bg-warning' : ($item->status == 'TERIMA' ? 'bg-success' : 'bg-danger') }}">
                                                {{ $item->status }}
                                            </span>
                                        </th>
                                        <th>
                                            <a href="{{ route('participants.show', ['participant' => $item->id]) }}"
                                                class="btn btn-primary btn-sm">
                                                Detail
                                            </a>
                                        </th>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>


                    </div>

                </div>
            </div>
        </div>
    @endvolt
</x-admin-layout>

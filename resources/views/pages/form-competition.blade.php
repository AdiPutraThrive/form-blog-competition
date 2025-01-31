<?php
use function Laravel\Folio\name;
use function Livewire\Volt\{state, rules, usesFileUploads, uses};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Participant;
use App\Models\Document;
use App\Models\Follow;

name('welcome');

usesFileUploads();

uses(LivewireAlert::class); // Tambahkan trait LivewireAlert

state([
    'document' => null,
    'prevDocument' => null,
    'follows' => [],
    'prevfollows',
    'fullname',
    'email',
    'whatsapp',
    'blog_link',
]);

rules([
    'fullname' => 'required|string|max:255',
    'email' => 'required|email|max:255',
    'whatsapp' => 'required|numeric|digits_between:11,13',
    'blog_link' => 'required|url|max:255',
    'document' => 'required|file|max:5120|mimes:pdf,doc,docx',
    'follows.*' => 'required|file|max:5120|mimes:pdf,jpg,jpeg',
]);

$save = function () {
    try {
        $this->validate();
        // Menyimpan data participant
        $participant = Participant::create([
            'fullname' => $this->fullname,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'blog_link' => $this->blog_link,
        ]);

        // Menyimpan dokumen
        if ($this->document) {
            $documentName = $this->generateDocumentName($this->document->getClientOriginalExtension());
            $documentPath = $this->document->storeAs(path: 'public/documents', name: $documentName);
            Document::create([
                'file_path' => $documentPath,
                'participant_id' => $participant->id,
            ]);
        }

        // Menyimpan bukti follow
        foreach ($this->follows as $follow) {
            $followName = $this->generateFollowName($follow->getClientOriginalExtension());
            $followPath = $follow->storeAs(path: 'public/follows', name: $followName);
            Follow::create([
                'image_path' => $followPath,
                'participant_id' => $participant->id,
            ]);
        }

        // Reset form setelah submit berhasil
        $this->reset(['follows', 'fullname', 'email', 'whatsapp', 'blog_link', 'document']);

        $this->flash('success', 'Completed', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => false,
            'onConfirmed' => '',
            'confirmButtonText' => 'SUBMIT FORMULIR BARU',
            'text' => 'Formulir telah berhasil disubmit.',
        ]);
    } catch (\Throwable $th) {
        $this->alert('error', 'Gagal menyimpan data', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Pastikan Anda telah mengisi semua kolom yang diperlukan dengan benar.',
            'timerProgressBar' => true,
        ]);
    }
};

$generateDocumentName = function ($extension) {
    $fileName = "Karya Tulis_{$this->fullname}_{$this->whatsapp}";
    $fileName = str_replace(' ', '_', $fileName) . '.' . $extension;
    return $fileName;
};

$generateFollowName = function ($extension) {
    // Misalkan kita mengambil platform dari nama file asli
    $platform = 'PlatformFile' . rand(1, 1000);
    $originalName = pathinfo($this->follows[0]->getClientOriginalName(), PATHINFO_FILENAME);
    $fileName = "Bukti follow_{$platform}_{$originalName}_{$this->fullname}";
    $fileName = str_replace(' ', '_', $fileName) . '.' . $extension;
    return $fileName;
};

$updatingFollows = function ($value) {
    $this->prevfollows = $this->follows;
};

$updatedFollows = function ($value) {
    $this->follows = array_merge($this->prevfollows, $value);
};

$removeItem = function ($key) {
    if (isset($this->follows[$key])) {
        $file = $this->follows[$key];
        $file->delete();
        unset($this->follows[$key]);
    }

    $this->follows = array_values($this->follows);
};

$updatingDocument = function () {
    $this->prevDocument = $this->document;
};

$updatedDocument = function () {
    // Hapus file sebelumnya jika ada
    if ($this->prevDocument) {
        $this->prevDocument->delete();
        $this->prevDocument = null;
    }
};

?>
<x-guest-layout>

    @volt
        <div>
            @include('pages.modal-form')
            <form wire:submit='save' method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mb-3 border-0">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Nama lengkap (Sesuai dengan KTP)</label> <input
                                type="text" class="form-control rounded-3" value="{{ old('fullname') }}"
                                wire:model="fullname" id="fullname" aria-describedby="fullnameId"
                                placeholder="Nama Lengkap" />

                            <!-- Error fullname -->
                            @error('fullname')
                                <small id="emailId" class="form-text color-custom"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card my-3 border-0">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control rounded-3" value="{{ old('email') }}"
                                wire:model="email" id="email" aria-describedby="emailId"
                                placeholder="contoh@email.com" />

                            <!-- Error email -->
                            @error('email')
                                <small id="emailId" class="form-text color-custom"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card my-3 border-0">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="whatsapp" class="form-label">
                                No whatsapp
                            </label>
                            <input type="number" class="form-control rounded-3" value="{{ old('whatsapp') }}"
                                wire:model="whatsapp" id="whatsapp" aria-describedby="whatsappId"
                                placeholder="08xxxxxxxxx" />

                            <!-- Error whatsappp -->
                            @error('whatsapp')
                                <small id="whatsappId" class="form-text color-custom"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="card my-3 border-0">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="blog_link" class="form-label">Link atau URL bukti tayang /
                                link publikasi blog</label>
                            <input type="url" class="form-control rounded-3" value="{{ old('blog_link') }}"
                                wire:model="blog_link" id="blog_link" aria-describedby="blog_linkId"
                                placeholder="link atau url" />

                            <!-- Error email -->
                            @error('blog_link')
                                <small id="blog_linkId" class="form-text color-custom"> {{ $message }} </small>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="card my-3 border-0">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="documentInput" class="form-label">
                                Upload karya tulis dalam bentuk file
                            </label>
                            <label id="dropZone"
                                class="d-flex align-items-center justify-content-center flex-column w-100 {{ $document ? 'd-none' : '' }}">
                                <p> <i class="bi bi-cloud-arrow-down"></i>
                                </p>
                                <small style="font-size: 17px;">Drop file here or click to upload</small>
                                <input type="file" class="d-none" id="documentInput" wire:model="document"
                                    accept=".pdf,.doc,.docx">
                            </label>

                            <!-- Error document -->
                            @error('document')
                                <small id="documentId" class="form-text color-custom"> {{ $message }} </small>
                            @enderror
                        </div>

                        @if ($document)
                            <div class="card my-2">
                                <div class="card-body">
                                    <div class="hstack justify-content-between align-items-center">
                                        <i class="bi bi-file-earmark-post"></i>
                                        {{ Str::limit($document->getClientOriginalName(), 20, '...') }}
                                        <a type="button" wire:click.prevent='$set("document", null)'>
                                            <i class="bi bi-x-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <small class="form-text text-muted m-0">
                            <strong>Upload File Maks 5 MB</strong> (format .pdf, .doc atau .docx)
                            <br>
                            <strong>Teknis penamaan file :</strong>
                            Judul Karya Tulis_Nama Lengkap Peserta_Nomor Telepon/HP
                            <br>
                            <strong>Contoh:</strong> Fakta dan Mitos tentang Mandi Air Hangat saat Demam_Ariston_0800000000
                        </small>
                    </div>
                </div>

                <div class="card my-3 border-0">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="imageInput" class="form-label">
                                Bukti follow akun social media Ariston Indonesia
                                <span wire:loading wire:target='follows' class="spinner-border spinner-border-sm mx-3"
                                    role="status">
                                </span>
                            </label>
                            <label for="imageInput"
                                class="{{ $follows ? (count($follows) === 4 ? 'd-none' : '') : '' }} w-100">
                                <div id="dropZone" class="d-flex align-items-center justify-content-center flex-column">
                                    <p> <i class="bi bi-cloud-arrow-down"></i>
                                    </p>
                                    <small style="font-size: 17px;">Drop file here or click to upload</small>
                                    <input type="file" class="d-none" id="imageInput" wire:model.live="follows"
                                        accept=".pdf,.jpg,.jpeg" multiple>
                                </div>
                            </label>

                            <!-- Error follow sosmed -->
                            @error('follows.*')
                                <small id="followsId" class="form-text color-custom"> {{ $message }}
                                </small>
                            @enderror
                        </div>

                        @if (!empty($follows))
                            <div class="row">
                                @foreach ($follows as $key => $item)
                                    <div class="col col-lg-6">
                                        <div class="card my-2">
                                            <div class="card-body">
                                                <div class="hstack justify-content-between align-items-center">
                                                    <div class="me-2" style="font-size: 2rem; color: #777;">
                                                        <i class="bi bi-file-earmark-text"></i>
                                                    </div>
                                                    <span class="overflow-hidden text-nowrap">
                                                        {{ Str::limit($item->getClientOriginalName(), 20, '...') }}
                                                    </span>
                                                    <a type="button"
                                                        wire:click.prevent='removeItem({{ json_encode($key) }})'>
                                                        <i class="bi bi-x-lg"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <small class="form-text text-muted m-0">
                            <strong>Upload File Maks 5 MB</strong> (format .pdf, .jpg atau
                            .jpeg)
                        </small>
                    </div>
                </div>

                <div class="card my-3 border-0">
                    <div class="card-body">
                        <div class="mb-3">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="requirements" required>
                                <label class="form-check-label" for="requirements">
                                    Saya sudah membaca dan menyetujui
                                    <a class="color-custom text-decoration-none" data-bs-toggle="modal"
                                        data-bs-target="#modalId">syarat dan
                                        ketentuan yang berlaku.</a>
                                </label>
                            </div>

                        </div>
                        <div class="mb-3">
                            <p>Dan menyatakan :</p>
                            <ol>
                                <li>
                                    Keikutsertaan dalam Ariston Indonesia Blog Competition 2024
                                </li>
                                <li>
                                    Mematuhi segala peraturan dan ketentuan yang telah ditetapkan oleh Ariston Blog
                                    Competition
                                    2024
                                </li>
                                <li>
                                    Menyerahkan karya original milik sendiri untuk dapat disertakan pada Ariston Blog
                                    Competition
                                    2024
                                </li>
                                <li>
                                    Bertanggung jawab penuh atas karya sendiri yang diikutsertakan pada Ariston Blog
                                    Competition
                                    2024
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="card my-3 border-0">
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">
                                <span wire:loading.class='d-none'>SUBMIT</span>
                                <div wire:loading wire:target='save' class="spinner-border spinner-border-sm"
                                    role="status">
                                </div>
                            </button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    @endvolt
</x-guest-layout>

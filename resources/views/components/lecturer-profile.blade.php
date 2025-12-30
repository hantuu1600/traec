<div class="card bg-base-100 border border-base-300 shadow-xl">
    <div class="card-body space-y-6">

        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg md:text-xl font-bold text-[#222831]">Profile Information</h2>
                <p class="text-sm text-[#222831]/70">
                    This data will be used for activities, documents, and verification.
                </p>
            </div>
            <div class="badge badge-warning text-black">Required</div>
        </div>

        <form id="lecturer-profile-form" method="POST" action="#" class="space-y-8">
            @csrf

            {{-- Personal Info --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <div class="badge badge-secondary text-white">Personal</div>
                    <div class="text-sm text-[#222831]/70">Basic lecturer information</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-secondary">Full Name</span>
                        </label>
                        <input type="text" name="name" placeholder="Full name"
                            class="input input-bordered w-full"
                            required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-[#222831]">Email</span>
                        </label>
                        <input type="email" name="email" placeholder="email@university.ac.id"
                            class="input input-bordered w-full"
                            required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-[#222831]">Phone Number</span>
                        </label>
                        <input type="tel" name="phonenumber" placeholder="+62..."
                            class="input input-bordered w-full"
                            required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-[#222831]">Profile Photo</span>
                        </label>
                        <input type="file" name="photo" class="file-input file-input-bordered w-full">
                    </div>

                </div>
            </div>

            <div class="divider my-0"></div>

            {{-- Academic Info --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <div class="badge badge-secondary text-white">Academic</div>
                    <div class="text-sm text-[#222831]/70">Academic information for validation</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-[#222831]">NIDN</span>
                        </label>
                        <input type="text" name="nidn" placeholder="NIDN"
                            class="input input-bordered w-full"
                            required>
                    </div>

                    <div class="form-control relative">
                        <label class="label">
                            <span class="label-text text-[#222831]">Faculty</span>
                        </label>
                        <select name="faculty" class="select select-bordered w-full relative z-10" required>
                            <option value="" disabled selected>Select Faculty</option>
                            <option value="Faculty of Engineering">Faculty of Engineering</option>
                            <option value="Faculty of Business & Management">Faculty of Business & Management</option>
                            <option value="Faculty of Economics">Faculty of Economics</option>
                            <option value="Faculty of Arts & Design">Faculty of Arts & Design</option>
                            <option value="Faculty of Languages">Faculty of Languages</option>
                        </select>
                    </div>

                    <div class="form-control relative">
                        <label class="label">
                            <span class="label-text text-[#222831]">Study Program</span>
                        </label>
                        <select name="prodi" class="select select-bordered w-full relative z-10" required>
                            <option value="" disabled selected>Select Study Program</option>
                            <option value="Informatics">Informatics</option>
                            <option value="Information Systems">Information Systems</option>
                            <option value="Industrial Engineering">Industrial Engineering</option>
                            <option value="Management">Management</option>
                            <option value="Accounting">Accounting</option>
                            <option value="Visual Communication Design">Visual Communication Design</option>
                            <option value="English Literature">English Literature</option>
                        </select>
                    </div>

                    <div class="form-control relative">
                        <label class="label">
                            <span class="label-text text-[#222831]">Position</span>
                        </label>
                        <select name="position" class="select select-bordered w-full relative z-10" required>
                            <option value="" disabled selected>Select Position</option>
                            <option value="Lecturer">Lecturer</option>
                            <option value="Head of Study Program">Head of Study Program</option>
                            <option value="Secretary of Study Program">Secretary of Study Program</option>
                            <option value="Dean">Dean</option>
                            <option value="Vice Dean">Vice Dean</option>
                            <option value="Teaching Staff">Teaching Staff</option>
                            <option value="Researcher">Researcher</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="divider my-0"></div>

            {{-- Links (optional) --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <div class="badge badge-secondary text-white">Links</div>
                    <div class="text-sm text-[#222831]/70">Optional to enrich your profile</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-[#222831]">Google Scholar</span>
                        </label>
                        <input type="url" name="scholar" placeholder="https://scholar.google.com/..."
                            class="input input-bordered w-full">
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-[#222831]">SINTA ID</span>
                        </label>
                        <input type="text" name="sinta" placeholder="SINTA ID"
                            class="input input-bordered w-full">
                    </div>

                </div>
            </div>

        </form>
    </div>
</div>

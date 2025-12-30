<div class="card bg-base-100 border border-base-300 shadow-xl h-fit">
    <div class="card-body space-y-5">

        <div class="flex items-center gap-4">
            <div class="avatar">
                <div class="w-14 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                    <img src="{{ asset('images/logo.webp') }}" alt="Avatar">
                </div>
            </div>

            <div class="space-y-1">
                <div class="text-lg font-bold text-secondary">Lecturer</div>
                <div class="text-sm text-secondary/70">
                    Complete your profile to gain full access to features.
                </div>
            </div>
        </div>

        <div class="divider my-0"></div>

        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <span class="text-sm text-secondary/70">Profile Status</span>
                <div class="badge badge-secondary text-white">Incomplete</div>
            </div>

            <progress class="progress progress-primary w-full" value="45" max="100"></progress>

            <div class="text-xs text-secondary/60">
                Fill in all required fields to complete your profile.
            </div>
        </div>

        <div class="divider my-0"></div>

        <div class="space-y-3">
            <div class="text-sm font-semibold text-[#222831]">Quick Tips</div>
            <ul class="list-disc text-sm text-[#222831]/70 space-y-2 pl-5">
                <li>Use an active email address</li>
                <li>Ensure your NIDN is correct</li>
                <li>Phone number is used for account recovery</li>
            </ul>
        </div>

    </div>
</div>

<div class="w-2/3 pr-2">
    <form action="{{ route('accounts.store') }}" method="post">
        @csrf
        <div class="flex">

            <label class="text-white" for="name">Name</label><br/>
            <input type="name" name="name" id="name" value="{{ old('name') }}" placeholder="Account name" class="rounded-sm px-2 h-10 mb-2 mr-2" autocomplete="off" required><br/>

            <label class="text-white" for="address">Address</label><br/>
            <input type="text" name="address" value="{{ old('address') }}" id="address" placeholder="Address" class="rounded-sm px-2 h-10 mb-2 mr-2" autocomplete="off" required><br/>

            <label class="text-white" for="state">State of Origin</label><br/>
            <input type="text" name="state" value="{{ old('state') }}" id="state" placeholder="State" class="rounded-sm px-2 h-10 mb-2 mr-2" autocomplete="off" required><br/>

            <label class="text-white" for="email">Email</label><br/>
            <input type="email" name="email" value="{{ old('email') }}" id="email" placeholder="Email" class="rounded-sm px-2 h-10 mb-2 mr-2" autocomplete="off" required><br/>

            <label class="text-white" for="phone">Phone Number</label><br/>
            <input type="text" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Phone Number" class="rounded-sm px-2 h-10 mb-2 mr-2" autocomplete="off" required><br/>

            <label class="text-white" for="name">Date of Birth</label><br/>
            <input type="date" name="dob" value="{{ old('dob') }}" id="doB" placeholder="12-12-2004" class="rounded-sm px-2 h-10 mb-2 mr-2" autocomplete="off" required><br/>

            <label class="text-white" for="gender">Gender</label><br/>
            <select name="gender" id="gender" required>
                <option value="">Select Gender</option>
                <option value="male" {{ old('address') === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('address') === 'female' ? 'selected' : '' }}>Female</option>
            </select> <br/><br/>

            <button type="submit" class="px-3 h-10 rounded-sm bg-green-gradient text-white font-medium">
                Add new account
            </button>
        </div>
    </form>
</div>

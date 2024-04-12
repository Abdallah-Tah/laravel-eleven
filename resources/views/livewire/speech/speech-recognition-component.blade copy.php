<!-- Alpine.js component -->
<div class="p-8 space-y-6" x-data="{ listening: false, result: '' }" x-init="Livewire.on('resultReceived', text => { result = text })">
    <h1 class="text-2xl font-bold">Speech Recognition</h1>

    <!-- Start Listening -->
    <button type="button" class="bg-sky-500 text-white py-4 px-8 rounded" @click="startRecognition()">
        Start Listening
    </button>

    <!-- Stop Listening -->
    <button type="button" class="bg-slate-500 text-white py-4 px-8 rounded" @click="stopRecognition()">
        Stop Listening
    </button>

    <!-- Results Display -->
    <div class="border border-green-500 rounded p-4">
        <input type="text" wire:model="result" wire:listen="listening">
    </div>

    <!-- Save Button -->
    <button wire:click="save" class="bg-sky-500 text-white py-4 px-8 rounded">
        Save
    </button>
</div>

@push('scripts')
    <script>
        function startRecognition() {
            const recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.continuous = true;
            recognition.lang = "en-US";
            recognition.interimResults = false;
            recognition.maxAlternatives = 1;

            recognition.onresult = function(event) {
                console.log("Speech Recognition Result:", event);
                const last = event.results.length - 1;
                console.log("Speech Recognition Text:", last, event.results[last][0].transcript);
                const text = event.results[last][0].transcript;
                Livewire.dispatch('resultReceived', [text]);
            };

            recognition.onerror = function(event) {
                console.error("Speech Recognition Error:", event.error);
            };

            recognition.start();
        }

        function stopRecognition() {
            recognition.stop();
        }

        document.addEventListener("alpine:init", () => {
            Alpine.data('speechRecognition', () => ({
                listening: false,
                result: '',

                startRecognition() {
                    this.listening = true;
                    startRecognition();
                },

                stopRecognition() {
                    this.listening = false;
                    stopRecognition();
                }
            }))
        });
    </script>
@endpush

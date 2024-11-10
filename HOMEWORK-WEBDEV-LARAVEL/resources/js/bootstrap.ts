import axios from "axios";
import Echo from "laravel-echo";
import Pusher from "pusher-js";

declare global {
    interface Window {
        axios: typeof axios;
        Echo: Echo;
        Pusher: typeof Pusher;
    }
}

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "reverb",
    key: import.meta.env.VITE_REVERB_APP_KEY ?? "",
    wsHost: import.meta.env.VITE_REVERB_HOST ?? "127.0.0.1",
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 8080,
    forceTLS: false,
    enabledTransports: ["ws", "wss"],
});

if (!import.meta.env.VITE_REVERB_APP_KEY) {
    console.error("VITE_REVERB_APP_KEY is not defined");
}

import HomeComponent from "./components/HomeComponent";
import AboutComponent from "./components/AboutComponent";

export default {
    mode: "history",
    routes: [
        {
            path: "/",
            component: HomeComponent
        },
        {
            path: "/about",
            component: AboutComponent
        }
    ]
}
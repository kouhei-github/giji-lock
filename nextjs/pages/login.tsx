import {NextPage} from "next";
import {Typewriter} from "react-simple-typewriter";

const Login: NextPage = () => {
    return (
        <div className={"bg-black min-h-screen flex flex-col w-full items-center justify-center"}>
            <div className={"border border-blue-300 space-y-[50px] py-8 w-full flex flex-col w-1/2 items-center justify-center shadow-lg shadow-[#87cefa]"}>
                <h2 className={"text-3xl text-center uppercase text-white tracking-[5px]"}>Login</h2>
                <div className={"space-y-[50px] flex flex-col w-2/3 justify-center my-12"}>
                    <input
                        type="text"
                        className={"w-2/3 mx-auto text-center py-1 border-blue-500 text bg-black border-2 rounded-2xl border-blue-500 text-[rgb(156,163,175)]"}
                        placeholder={"USERNAME"}
                    />
                    <input
                        type="text"
                        className={"w-2/3 mx-auto text-center py-1 border-blue-500 text bg-black border-2 rounded-2xl border-blue-500 text-[rgb(156,163,175)]"}
                        placeholder={"PASSWORD"}
                    />
                    <div className={"w-1/3 cursor-pointer mx-auto text-center py-1 border-green-500 text bg-black border-2 rounded-2xl border-blue-500 hover:text-white text-[rgb(156,163,175)]"}>
                        Login
                    </div>
                    <small className={"text-white text-right w-3/4 mx-auto"}>
                        <span className={"underline text-lg underline-offset-2 cursor-pointer hover:text-blue-500"}>sign in</span>
                    </small>
                </div>
            </div>
        </div>

    )
}

export default Login;

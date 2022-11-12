import {NextPage} from "next";


const SideBar: NextPage = () => {
    const menus = ["最新の投稿", "議事録の投稿", "ユーザー一覧", "お知らせ", "カレンダー", "最新の投稿", "議事録の投稿", "ユーザー一覧", "お知らせ", "カレンダー"]
    const userName = "永松光平"
    return (
        <div className={"min-h-screen w-[300px] shadow-xl shadow-black"}>
            <div className={"w-11/12 mx-auto space-y-5"}>
                <div className={"w-full mt-5 mb-10"}>
                    <img src="https://imagenavi.jp/imgs/topics/japanese/1904_pickup.jpg" alt="" className={"w-36 h-36 rounded-full mx-auto object-cover object-center"} />
                    <p className={"text-center my-3"}>{userName}</p>
                </div>
                <div className={"h-[500px] overflow-y-scroll space-y-3.5"}>
                    {menus.map((menu, key) =>
                        <div key={key} className={"flex items-center justify-around hover:bg-[rgb(156,39,176)] hover:text-white hover:font-bold cursor-pointer"}>
                            <div className={"w-1/2 mx-auto"}>
                                <svg className={"w-7 h-7 mx-auto"} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                            </div>
                            <div className={"w-1/2 mx-auto text-left py-2.5"}>
                                {menu}
                            </div>
                        </div>
                    )}
                </div>

            </div>
        </div>

    )
}

export default SideBar;

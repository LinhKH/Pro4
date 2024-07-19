function a(t){const e={year:"numeric",month:"short",day:"2-digit",hour:"2-digit",minute:"2-digit"};return new Intl.DateTimeFormat("en-Us",e).format(new Date(t))}function s(){mainChatInbox.scrollTop(mainChatInbox.prop("scrollHeight"))}window.Echo.private("message."+USER.id).listen("MessageEvent",t=>{console.log(t);let e=$(".chat-content");if(e.attr("data-inbox")==t.sender_id)var i=`
                <div class="chat-item chat-left" style="">
                    <img src="${t.sender_image}">
                    <div class="chat-details">
                        <div class="chat-text">${t.message}</div>
                        <div class="chat-time">${a(t.date_time)}</div>
                    </div>
                </div>
            `;e.append(i),s(),$(".chat-user-profile").each(function(){$(this).data("id")==t.sender_id&&$(this).find("img").addClass("msg-notification")}),$(".message-envelope").addClass("beep")});

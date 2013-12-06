<nav class="socialnav">
    <ul class="nav navFooter">
        <% if $Twitter %>
            <li class="twitter">
                <a href="$Twitter" title="Our Twitter profile">
                    <img src="{$BaseHref}/sstweaks/images/twitter-33.png" alt="twitter logo" />
                </a>
            </li>
        <% end_if %>

        <% if $Facebook %>
            <li class="facebook">
                <a href="$Facebook" title="Our Facebook profile">
                    <img src="{$BaseHref}/sstweaks/images/fb-33.png" alt="facebook logo" />
                </a>
            </li>
        <% end_if %>

        <% if $YouTube %>
            <li class="youtube">
                <a href="$YouTube" title="Our YouTube profile">
                    <img src="{$BaseHref}/sstweaks/images/youtube-33.png" alt="youtube logo" />
                </a>
            </li>
        <% end_if %>

        <% if $LinkdIn %>
            <li class="linkdin">
                <a href="$LinkdIn" title="Our LinkdIn profile">
                    <img src="{$BaseHref}/sstweaks/images/linkedin-33.png" alt="linkdin logo" />
                </a>
            </li>
        <% end_if %>

        <% if $Pinterest %>
            <li class="pinterest">
                <a href="$Pinterest" title="Our Pinterest profile">
                    <img src="{$BaseHref}/sstweaks/images/pinterest-33.png" alt="pinterest logo" />
                </a>
            </li>
        <% end_if %>
    </ul>
</nav>

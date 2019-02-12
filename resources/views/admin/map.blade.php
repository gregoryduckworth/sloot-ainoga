<style>
@media (max-width: 720px) {
        img {
            margin-left: -2px;
        }
    }
</style>
@spaceless
    <h2>Map</h2>
    <?php $counter = 0;?>
    <center>
    <table style="border-spacing: 0px; padding-bottom:20px; padding-top:20px;">
        <tr>
    @foreach($coords as $coord)
        <?php $counter++;?>
        <td>
            @if($coord->image != '')
                <img src="{{ '/images/' . $coord->image }}" style="width: 20px; border: 0;">
            @else
                <img src="/images/unknown.gif" style="width: 20px; border: 0;">
            @endif
            @if($counter === 400)
                <?php $counter = 0;?>
            </tr>
            @endif
        </td>
    @endforeach
    </table>
    </center>
@endspaceless
